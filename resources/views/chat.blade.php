<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduHelperAgent</title>

    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
</head>

<body>

    @if ($errors->has('message'))
        <div id="toast">
            {{ $errors->first('message') }}
        </div>
    @endif

    <div class="container">

        <div class="header">
            <h2>EduHelperAgent</h2>
            <p>Ask about Solar System, Fractions, or Water Cycle</p>
        </div>

        <div class="chat-box">
            <div id="typing" style="display:none; color:#6b7280; margin-top:10px;">
                📘 EduHelperAgent is typing...
            </div>
            @if (count(session('history', [])) > 0)

                @foreach (session('history', []) as $chat)
                    <div class="message {{ $chat['role'] == 'user' ? 'user' : 'assistant' }}">

                        <strong>
                            {{ $chat['role'] == 'user' ? 'Student' : 'Agent' }}
                        </strong>

                        <br><br>

                        {{ $chat['content'] }}

                    </div>
                @endforeach
            @else
                <div style="text-align:center; padding:60px 20px; color:#6b7280;">

                    <div style="font-size:70px; margin-bottom:15px;">
                        🤖
                    </div>

                    <h2 style="margin:0; color:#374151;">
                        Welcome to EduHelperAgent
                    </h2>

                    <p style="margin-top:12px; font-size:15px; line-height:1.6;">
                        Ask questions about
                        <strong>Solar System</strong>,
                        <strong>Fractions</strong>,
                        or
                        <strong>Water Cycle</strong>
                    </p>

                </div>

            @endif

        </div>

        <div class="form-area">

            <form method="POST" action="/chat">

                @csrf

                <div class="input-group">

                    <input type="text" name="message" placeholder="Ask your question...">

                    <button class="send-btn" type="submit">
                        Send
                    </button>

                </div>

            </form>

            <form method="GET" action="/reset">

                <button class="reset-btn" type="submit">
                    Reset Chat
                </button>

            </form>

        </div>

    </div>

    <script>
        window.onload = function() {

            const chatBox = document.querySelector('.chat-box');

            if (chatBox) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }

            const toast = document.getElementById('toast');

            if (toast) {

                setTimeout(() => {

                    toast.style.display = 'none';

                }, 2000);
            }
        };
    </script>

</body>

</html>
