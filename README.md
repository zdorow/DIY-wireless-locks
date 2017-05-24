# DIY-wireless-locks

This was a project for my home using a pi zero and an arduino for wireless door control.


The  bash script to send signals is simply:

#!/bin/bash

echo v > /tty/ACM0
