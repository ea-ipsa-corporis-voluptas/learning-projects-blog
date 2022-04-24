<script type="text/javascript">
    function passwordVisibility() {
        let retype = typeof document.getElementById('password_confirmation');
        let password = document.getElementById('password');
        if(retype) {
            retype = document.getElementById('password_confirmation');
        }
        if(password.type == 'password') {
            password.type = 'text';
            if(retype) {
                retype.type = 'text';
            }
        }
        else if(password.type == 'text') {
            password.type = 'password';
            if(retype) {
                retype.type = 'password';
            }
        }
    }
</script>