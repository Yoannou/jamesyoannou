#!/bin/bash

# Will these vars clash with the vars in the replace.sh files being executed?
old=$1
new=$2

# Change this to include relevant files and maybe add the 'resources' string:
function updateFiles {
	replace.sh text1.txt $1 $2
	replace.sh text2.txt $1 $2
	replace.sh megatext.txt $1 $2
}

if [ $# != 2 ]
then
	echo "Usage: $0 oldString replacement"
else
	echo "Replace all instances of '$old' with '$new' in relevant files?"
	echo "[ y / n ]"

	while read confirmation
	do
		if [ "$confirmation" == "y" -o "$confirmation" == "Y" ]
		then
			echo "Executing"
			updateFiles $old $new >> update-history.txt
			echo "" >> update-history.txt
			echo "Files updated - details saved to update-history.txt"
			break
		elif [ "$confirmation" == "n" -o "$confirmation" == "N" ]
		then
			echo "Aborting"
			break
		else
			echo "Please enter yes [ y ] or no [ n ]"
		fi
	done
fi
