/*! for licence details, see https://gitlab.com/dave.ursa/Zounds */
var Zounds;
(function (Zounds_1) {
    /**
     * Root class for Zounds system.
     * Exposes simple access methods and the ability to instantiate more complex features, like:
     * A @see Library is used to hold your sounds, against their URLs & a more friendly id.
     * A @see Zample is a pre-loaded media file that you can play as many times as you like (concurrently).
     * A @see Zinstance is a currently playing Audio file which you can stop or manipulate in other ways.
     */
    var Zounds = (function () {
        function Zounds() {
            var _this = this;
            this.loading = 0;
            this.loadedCallback = function () { };
            this.sampleDict = {};
            this.sampleLibrary = {};
            this.dummyZinstance = new Zinstance(null, null);
            this.dummyZample = new ZampleInner("dummy", false, 0, function () { /*nop */ return _this.dummyZinstance; });
            this.innerContext = new InnerZoundsContext();
        }
        //Utility Functions
        /**
         * just play the audio media found at the URL until the end.
         * If you wish to pre-cache the file before playing or stop the sound mid-playback you need @see load()
         * @param {string} url the url to the audio media to be played.
         */
        Zounds.prototype.playURL = function (url) {
            this.load(url, "", true, -1);
        };
        //Library Functions
        /**
       * Asynchronously add a new sample to the library and return the Zample representation
       * @param {string} url the url where the audio media can be found
       * @param {string} id an id to give the sound for later retrvial by @see getSampleById leave as "" to extract just the filename minus the extension e.g. "../assets/sounds/wow.mp3"  would extract 'wow'
       * @param {boolean} playWhenLoaded whether to play the sample as soon as it is loaded, note that the @see Zinstance for this is lost due to the asynchronous nature of loading.
       * @param {number} gapBetweenPlays a number of ms that will be left between play actually working, to prevent the sample being played too often. -1 for no limiting.
       * @return the Zample representing the loaded sound ready to be instantiated
       */
        Zounds.prototype.load = function (url, id, playWhenLoaded, gapBetweenPlays) {
            var _this = this;
            if (id === void 0) { id = ""; }
            if (playWhenLoaded === void 0) { playWhenLoaded = false; }
            if (gapBetweenPlays === void 0) { gapBetweenPlays = -1; }
            if (id.length == 0) {
                id = url.split('/').pop().split('.')[0];
            }
            if (this.innerContext.error) {
                // There's to be no sound today folks, 
                // just make this look as much like the real thing to the caller and drop out.
                this.pushLoading();
                setTimeout(function () { _this.popLoading(); }, 500);
                return this.dummyZample;
            }
            //look for the sample in the already loaded list
            var sample = this.sampleDict[url];
            if (sample !== undefined) {
                // this sample is already a thing, 
                // mark it to play either now or when loaded
                if (playWhenLoaded) {
                    sample.play();
                }
                // if the sample is in the dict it will already be loading, don't double up
                return sample;
            }
            // make sure the system knows there's another sample loading
            this.pushLoading();
            //create the sample object to contain the data
            sample = new ZampleInner(url, playWhenLoaded, gapBetweenPlays, function (buf) { return _this.innerContext.playBuffer(buf); });
            //add the object to the dictionary and the Library
            this.sampleDict[url] = sample;
            this.sampleLibrary[id] = sample;
            //now begin the async loading jazz
            var req = new XMLHttpRequest();
            req.open('GET', url, true);
            req.responseType = 'arraybuffer';
            req.onload = function (ev) {
                if (req.status == 200) {
                    _this.innerContext.context.decodeAudioData(req.response, function (buffer) {
                        sample.buffer = buffer;
                        sample.loadComplete = true;
                        if (sample.playWhenLoaded) {
                            sample.play();
                        }
                        _this.popLoading();
                    });
                }
                else {
                    // HTTP status != 200
                    //deal with the callback
                    _this.loadedCallback(false, req.statusText + ": " + url);
                    throw new Error(req.statusText + ": " + url);
                }
            };
            req.onerror = function () {
                throw new Error("Network Error");
            };
            req.send();
            return sample;
        };
        /**
         * Retrieve the Zample that is tied to the give id on this Library.
         * @param {string} id the id as used when the sample was loaded @see load()
         */
        Zounds.prototype.getById = function (id) {
            return this.sampleLibrary[id];
        };
        /**
         * Play the sample that is tied to the give id on this Library.
         * @param {string} id
         */
        Zounds.prototype.playById = function (id) {
            var zamp = this.getById(id);
            return zamp.play();
        };
        Zounds.prototype.getLibrary = function () {
            return this;
        };
        Zounds.prototype.pushLoading = function () {
            this.loading++;
        };
        Zounds.prototype.popLoading = function () {
            this.loading--;
            if (this.loading == 0) {
                this.loadedCallback(true, "");
                this.loadedCallback = function () { };
            }
        };
        /**
        * Set a callback for sample loading.
        * This will either be called when all samples are loaded.
        * or once for each sample that fails to load.
        * Note, that if more samples are added to be loaded after success, it will not be called again.
        * if loading is already complete this will be called synchronously.
        * @param cback the callback function, the params will indicate the outcome and cause of a failure
        */
        Zounds.prototype.callBackWhenComplete = function (cback) {
            this.loadedCallback = cback;
            if (this.innerContext.context === undefined) {
                cback(false, "Sound not supported.");
            }
            if (this.loading == 0) {
                this.loadedCallback(true, "");
                this.loadedCallback = function () { };
            }
            else {
                //still loading
                //callback has been registered and will trigger when ready.
            }
        };
        /**
         * A debugging assistance function, used as a last resort to see what didn't load.
         * e.g. from the browser jscript console type: zounds.getSamplesStillLoading()
         * Whilst an empty set could be a way of checking for whether loading is done, you really
         * should use the @see callBackWhenComplete method.
         *
         * @returns the array of sample urls that have not exited the loading state (either failed or waiting)
         */
        Zounds.prototype.getSamplesStillLoading = function () {
            var rval = [];
            for (var url in this.sampleDict) {
                if (!this.sampleDict[url].loadComplete) {
                    rval[rval.length] = url;
                }
            }
            return rval;
        };
        return Zounds;
    }());
    Zounds_1.Zounds = Zounds;
    /**
     * a class to wrap the audio context and handle any issues with it.
     */
    var InnerZoundsContext = (function () {
        function InnerZoundsContext() {
            this.error = true;
            try {
                //cope with odd issue 
                window["AudioContext"] = window["AudioContext"] || window["webkitAudioContext"];
                this.context = new AudioContext();
                this.error = false;
            }
            catch (e) {
                console.log("No Audio. Exception: " + e);
            }
        }
        InnerZoundsContext.prototype.playBuffer = function (samp) {
            if (this.error) {
                throw new Error("Cannot play the buffer as there is no Audio Context");
            }
            var source = this.context.createBufferSource();
            source.loop = samp.loop;
            source.connect(this.context.destination);
            source.buffer = samp.buffer;
            source.start();
            return new Zinstance(source, samp);
        };
        return InnerZoundsContext;
    }());
    var ZampleInner = (function () {
        function ZampleInner(url, playWhenLoaded, maxPlayFreq, playRaw) {
            this.url = url;
            this.playWhenLoaded = playWhenLoaded;
            this.maxPlayFreq = maxPlayFreq;
            this.playRaw = playRaw;
            this.loadComplete = false;
            this.loop = false;
            this.lastPlayed = 0;
        }
        ZampleInner.prototype.play = function () {
            if (!this.loadComplete) {
                this.playWhenLoaded = true;
                return null;
            }
            if (this.maxPlayFreq > 0) {
                var tslp = Date.now() - this.lastPlayed;
                if (tslp < this.maxPlayFreq) {
                    // don't play, as this has happened too recently.
                    return null;
                }
                else {
                    this.lastPlayed = Date.now();
                }
            }
            return this.playRaw(this);
        };
        ZampleInner.prototype.setMaxPlayFrequency = function (ms) {
            this.maxPlayFreq = ms;
        };
        return ZampleInner;
    }());
    var Zinstance = (function () {
        function Zinstance(bsNode, zample) {
            this.bsNode = bsNode;
            this.zample = zample;
        }
        Zinstance.prototype.stop = function () {
            this.bsNode.stop();
        };
        return Zinstance;
    }());
    Zounds_1.Zinstance = Zinstance;
})(Zounds || (Zounds = {}));
/**
 * An instance of the zounds system for the current page.
 */
var zounds = new Zounds.Zounds();
//# sourceMappingURL=zounds.js.map