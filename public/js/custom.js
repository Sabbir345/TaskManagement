/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {
    $("input[type='password'][data-eye]").each(function (i) {
        var $this = $(this);

        $this.wrap($("<div/>", {
            style: 'position:relative'
        }));
        $this.css({
            paddingRight: 60
        });
        $this.after($("<div/>", {
            html: 'Show',
            class: 'btn btn-primary btn-sm',
            id: 'passeye-toggle-' + i,
            style: 'position:absolute;right:10px;top:50%;transform:translate(0,-50%);-webkit-transform:translate(0,-50%);-o-transform:translate(0,-50%);padding: 2px 7px;font-size:12px;cursor:pointer;'
        }));
        $this.after($("<input/>", {
            type: 'hidden',
            id: 'passeye-' + i
        }));
        $this.on("keyup paste", function () {
            $("#passeye-" + i).val($(this).val());
        });
        $("#passeye-toggle-" + i).on("click", function () {
            if ($this.hasClass("show")) {
                $this.attr('type', 'password');
                $this.removeClass("show");
                $(this).removeClass("btn-outline-primary");
            } else {
                $this.attr('type', 'text');
                $this.val($("#passeye-" + i).val());
                $this.addClass("show");
                $(this).addClass("btn-outline-primary");
            }
        });
    });
});

//login form script end here

//==================to pull the my account btn right===================

$('.dropdown-toggle').on("click", function () {
    var dropdownList = $('.dropdown-menu'),
            dropdownOffset = $(this).offset(),
            offsetLeft = dropdownOffset.left,
            dropdownWidth = dropdownList.width(),
            docWidth = $(window).width(),
            subDropdown = dropdownList.eq(1),
            subDropdownWidth = subDropdown.width(),
            isDropdownVisible = (offsetLeft + dropdownWidth <= docWidth),
            isSubDropdownVisible = (offsetLeft + dropdownWidth + subDropdownWidth <= docWidth);

    if (!isDropdownVisible || !isSubDropdownVisible) {
        dropdownList.addClass('pull-right');
    } else {
        dropdownList.removeClass('pull-right');
    }
});