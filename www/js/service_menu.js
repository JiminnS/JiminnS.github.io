document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.services-list > li').forEach(function (item) {
        var sublist = item.querySelector('ul');
        if (sublist) {
            sublist.style.maxHeight = '0';
            sublist.style.overflow = 'hidden';
        }

        item.addEventListener('mouseover', function () {
            if (sublist) {
                sublist.style.maxHeight = sublist.scrollHeight + 'px';
            }
        });

        item.addEventListener('mouseout', function () {
            if (sublist) {
                sublist.style.maxHeight = '0';
            }
        });
    });
});