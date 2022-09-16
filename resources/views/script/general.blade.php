    <script>
    function successPopup(title, msg)
    {
        const myNotification = window.createNotification({
            // options here
        });

        myNotification({ 
            title: title,
            message: msg 
        });

        myNotification({ 
            // close on click
            closeOnClick: true,
            // displays close button
            displayCloseButton: false,
            // nfc-top-left
            // nfc-bottom-right
            // nfc-bottom-left
            positionClass: 'nfc-top-right',
            // callback
            onclick: false,
            // timeout in milliseconds
            showDuration: 3500,
            // success, info, warning, error, and none
            theme: 'success'    
        });    
    }
    

    function getText(el)
    {
        var elem = $(el).parent().prev();
        elem.select();
        document.execCommand('copy');

        successPopup('Copy', 'Coupon was copied successfully.') 
    }
    </script>