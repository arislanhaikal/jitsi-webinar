<html itemscope itemtype="http://schema.org/Product" prefix="og: http://ogp.me/ns#" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https:/webinar.aqi.co.id/external_api.js"></script>
        <title>{{ $room->class }}</title>
        <script>
            $( document ).ready(function() {
                var domain = "webinar.aqi.co.id";
                var options = {
                    roomName: '{{ $room->slug }}',
                    width: '100%',
                    height: '100%',
                    noSSL: false,
                    jwt: '{{ $jwt }}',
                    parentNode: document.querySelector('#meet'),
                    configOverwrite: {},
                }
                var api = new JitsiMeetExternalAPI(domain, options);
                api.executeCommands({
                    displayName: [ '{{ $participant->user->name }}' ],
                    @if($participant->user->role == 'student')
                    toggleAudio: [],
                    toggleVideo: [],
                    @endif
                });
            });
        </script>
    </head>
    <body style="margin:0;padding:0">
        <div id="meet"></div>
    </body>
</html>