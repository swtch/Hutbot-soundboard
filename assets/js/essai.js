function submit(sound){
    $.ajax({
        url: getHost()+"play",
        hearders : {
            'cache-control': 'no-cache',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        type: 'post',
        data: { "voiceChannel": $('#VoiceChannel :selected').val(),
            "sound": sound
        },
        success: function(response) { alert(response); }
    });
}