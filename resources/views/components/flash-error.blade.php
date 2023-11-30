@if ($errors->any())
    <div id="error-message" style="display: flex; justify-content: center; align-items: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffcccc; padding: 20px; border: 1px solid #ff9999; border-radius: 5px; z-index: 9999;">
        <span style="color: #cc0000; font-weight: bold;">Error: {{ $errors->first() }}</span>
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('error-message').style.display = 'none';
        }, 2000);
    </script>
@endif
