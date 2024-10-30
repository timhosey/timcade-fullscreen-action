// Script that will automatically run to process queue and play videos,
// with pauses in between
var video = document.getElementById('video');
var source = document.createElement('source');

// Variable to indicate if a video is playing actively or not
playing = false;
waiting = false;
firstrun = 1;

video_data = [];

// Sets up the video
function play_video(fileName) {
  video.appendChild(source);
  source.setAttribute('src', 'video/'+fileName+'.webm');
  source.setAttribute('type', 'video/webm');
  video.load();
  video.play();
  playing = true;
  console.log({
    src: source.getAttribute('src'),
    type: source.getAttribute('type'),
  });
}

// Checks video_queue.php for JSON
function check_queue() {
  if(waiting) { console.log('Waiting...'); }
  if(playing) { console.log('Playing...'); }
  if (!waiting && !playing) {
    // TODO: Should check for a new video
    console.log('Playing video...');
    // play_video('end-of-computer');
    get_json('video_queue.php?action=queue',
      function(err, data) {
        if (err !== null) {
          console.log('Something went wrong: ' + err);
        } else {
          if (data['vidName'] != undefined) {
            video_data = data;
            play_video(data['vidName']);
          } else {
            console.log('Queue is empty.');
          }
        }
      }
    );
  }
}

function remove_video(id) {
  get_json('video_queue.php?action=remove&id='+id,
    function(err, data) {
      if (err !== null) {
        console.log('Something went wrong: ' + err);
      } else {
        console.log('removed: '+data);
      }
    }
  );
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

video.addEventListener('ended', function(event) {
  console.log('video finished, id '+video_data['id']);
  video.removeChild(source);
  remove_video(video_data['id']);
  // Sets waiting to true and kicks off a timer
  waiting = true;
  // Sets a timeout for the pause duration
  setTimeout(function() {waiting = false;}, (pause * 1000));
  playing = false;
});

// Since it's all loaded, let's run the first check!
//check_queue();