# Full Screen Action Script
This is a script intended for full-screen actions triggered from a bot or other webhook tool, to act as an overlay for playing full-screen WEBM videos.

## Usage
Your webhook should point at `video_queue.php?action=add&vname=NAME_OF_WEBM_WITHOUT_EXT` to enqueue a video, which will then play once the `overlay.php` file's Javascript picks up the change by requesting the JSON-formatted queue from `video_queue.php?action=queue`.

The file `overlay.php` should be set to the dimensions of your canvas in OBS, and the `overlay.php` file is what you put in your Browser Source, with the dimensions of the Browser Source set to the same dimensions. The default is 1920x1080, so no need to change this setting if you're running at that resolution on your canvas.

## TODO
* Store queue as a text file
* The `queue` action should return JSON of all the enqueued videos
* JavaScript should calculate video length + a setting that can be configured as a number of seconds before playing the next video