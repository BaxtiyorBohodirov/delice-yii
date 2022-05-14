if (typeof window.jQuery === 'undefined') {
    throw new Error('Jquery plugin not inserted in site')
} else {
    jQuery.fn.customModal = function (customOptions) {
        var options = {
            width: 500,
        };

        for (let option in customOptions) {
            if (options.hasOwnProperty(option)) {
                options[option] = customOptions[option]
            }
        }

        function setWidth(node) {
            node.css('width', options.width + 'px')
        }

        this.each(function () {
            var button = $(this),
                modalWindow = $(button.attr('data-nodeModal')),
                modalWindowInner = modalWindow.find('.custom-modal-inner');
            console.log(button);
            setWidth(modalWindowInner);
            button.on('click', function (e) {
                e.preventDefault()
                modalWindow.fadeIn();
                modalWindow.css('display', 'flex')
            })

            modalWindow.on('click', function (e) {
                var target = $(e.target);

                if (!(target.is('.custom-modal-inner') || target.is('.custom-modal-inner *'))) {
                    modalWindow.fadeOut();
                }
            })
        })
    }
    $('button[data-nodeModal],a[data-nodeModal]').customModal({width: 500})
}



