@if (session('message'))
    <div id="message" style="display: flex; justify-content: center; align-items: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #8DF386; padding: 20px; border: 1px solid #138E0B; border-radius: 5px; z-index: 9999;">
        <span style="color: #138E0B; font-weight: bold;">{{ session('message') }}</span>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('message').style.display = 'none';
        }, 2000);
    </script>
@endif
