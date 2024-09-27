// Script that will automatically run to process queue and play videos,
// with pauses in between
video_el = document.getElementById('video');
source_el = document.getElementById('videosrc');

// Variable to indicate if a video is playing actively or not
playing = false;
waiting = false;
firstrun = 1;

// Sets up the video
function play_video(fileName) {
  source_el.setAttribute('src', 'video/'+fileName+'.webm');
  source_el.setAttribute('type', 'video/webm');
  video.appendChild(source_el);
  playing = true;
  video_el.play();
  console.log({
    src: source_el.getAttribute('src'),
    type: source_el.getAttribute('type'),
  });
}

// Checks video_queue.php for JSON
function check_queue() {
  if(waiting) { console.log('Waiting...'); }
  if(playing) { console.log('Playing...'); }
  if (!waiting && !playing) {
    // TODO: Should check for a new video
    console.log('Playing video...');
    play_video('end-of-computer');
  }
  /*
  get_json('video_queue.php?action=queue',
    function(err, data) {
      if (err !== null) {
        console.log('Something went wrong: ' + err);
      } else {
        console.log('Your queue count: ' + data.query.count);
      }
    });
  */
}

// JSON get function
var get_json = function(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'json';
  xhr.onload = function() {
    var status = xhr.status;
    if (status === 200) {
      callback(null, xhr.response);
    } else {
      callback(status, xhr.response);
    }
  };
  xhr.send();
};

video_el.addEventListener('ended', function(event) {
  console.log('video finished');
  // Sets waiting to true and kicks off a timer
  waiting = true;
  // Sets a timeout for the pause duration
  setTimeout(function() {waiting = false;}, (pause * 1000));
  playing = false;
});

// Since it's all loaded, let's run the first check!
//check_queue();