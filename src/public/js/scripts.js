function loadComments(lastPage = false) {

    $.ajax({
        type: "GET",
        url: "/comments/",
        processData: false,
        success: function (result) {
            if ('error' in result) {
                console.log(result.error)
            } else {
                commentsData = result;
                if (lastPage) {
                    currentPage = Math.ceil(commentsData.length / 10);
                }
                commentsData = commentsData.map((row )=> {
                    const date = new Date(row['date']);
                    row['date'] = ('0' + date.getDate()).slice(-2) + '.' + ('0' + (date.getMonth() + 1)).slice(-2) + '.' + date.getFullYear();
                    return row;
                });
                refreshCommentsList();
            }
        }
    });
}


function refreshCommentsList() {
    $('table tbody tr.table-data-row').remove();
    let html = '';
    const firstCommentNum = (currentPage - 1) * 10 + 1;

    if (commentsData) {
        const data = commentsData.slice(firstCommentNum, firstCommentNum + 10);
        for (let elem in data) {
            if (data[elem]) {
                html = '<tr class="table-data-row">' +
                    '<td><span class="table-date">' + data[elem]['date'] + '</span></td>' +
                    '<td><span class="table-name">' + data[elem]['name'] + '</span></td>' +
                    '<td><span class="table-text">' + data[elem]['text'] + '</td>' +
                    '</tr>';
                $('table tbody').append(html);
                html = '';
            }

        }

        let totalLength = commentsData.length;

        const totalPages = Math.ceil(totalLength / 10);

        const beginPage = (currentPage > 5 && totalPages > 10) ? ((totalPages - currentPage > 5)?currentPage - 5: totalPages-10 ) : 1;
        const endPage = (totalPages - beginPage > 10) ? beginPage + 10 : totalPages;

        $('ul.paging li').remove();

        html = '<li><a href="#" page-home = "1">←</a></li>';
        $('ul.paging').append(html);

        for (let i = beginPage; i <= endPage; i++) {
            html = '<li>' + ((i === currentPage) ? '<span>' + i + '</span>' :
                '<a href="#" page=' + i + ' ' + ((i === currentPage) ? 'active' : '') + '>' + i + '</a>') + '</li>';
            $('ul.paging').append(html);
            html = '';
        }

        html = '<li><a href="#" page-end = "1">→</a></li>';
        $('ul.paging').append(html);

        const endCommentNum = Math.min(currentPage * 10, totalLength);
        html = 'Показаны комментарии с <span class="marker-number">' + firstCommentNum +
            '</span> по <span class="marker-number">' + endCommentNum + '</span>'
        'из <span class="marker-number">' + totalLength + '</span>';
        $('.pagination-status').html(html);

    }

}


function addComment() {

    var data = new FormData();
    data.append('name', $('#comment_name').val());
    data.append('text', $('#comment_text').val());


    let commentDate = $('#comment_date').val();
    const dateParts = commentDate.split(".");
    commentDate = new Date(dateParts[2], dateParts[1] - 1, +dateParts[0]);

    data.append('date',commentDate.toISOString().split('T')[0]);

    $.ajax({
        type: "POST",
        url: "/comments/add",
        processData: false,
        contentType: false,
        data: data,
        success: CommentResult
    });

    return false;

}


function CommentResult(result) {
    if (result && result.error) {
        alert(result.error);
    } else if (result) {
        loadComments(true);
    }

    return false;
}


let commentsData = [];
let currentPage = 1;
let from = 0;
let to = 0;
$(function () {
    loadComments();
    $("ul.paging").on("click", "li a", function (e) {

        if ($(this).attr('page-home')) {
            currentPage = 1;
            refreshCommentsList();
        } else if ($(this).attr('page-end')) {
            currentPage = Math.ceil(commentsData.length / 10);
            refreshCommentsList();
        } else {
            const page = parseInt($(this).attr('page'));
            if (page) {
                currentPage = page;
                refreshCommentsList();
            }
        }
        e.preventDefault();
    });


    $("#clearCommentForm").click(function (e) {
        $('#comment_name').val('');
        $('#comment_text').val('');
        $('#comment_date').val('');
        e.preventDefault();
    });

    $("#commentForm").validate({
        submitHandler: function (form) {
        },
        rules: {
            text: "required",
            name: {
                required: true,
                email: true
            },
            date: {
                required: true,
                dateFormat: true
            }
        },

        messages: {
            text: "Введите текст комментария",
            name: {
                required: "Введите имя",
                email: "Введите корректный email"
            },
            date: {
                required: "Введите дату",
            },
        }


    });

    $("#commentForm").submit(function (e) {
        e.preventDefault();
        if ($("#commentForm").valid()) {
            addComment();
        }
    });


    $("#submitCommentForm").click(function (e) {
        $(this).attr( "disabled", true );
        $("#commentForm").submit();
        setTimeout(function() {
            $(this).attr( "disabled", true );

        }, 1000);
        e.preventDefault();
    });


    $("#comment_date").datepicker();
    $("#comment_date").datepicker("setDate", new Date());


    $.validator.addMethod(
        "dateFormat",
        function (value, element) {
            let check = false;
            const re = /^\d{1,2}\.\d{1,2}\.\d{4}$/;
            if (re.test(value)) {
                var adata = value.split('.');
                var dd = parseInt(adata[0], 10);
                var mm = parseInt(adata[1], 10);
                var yyyy = parseInt(adata[2], 10);
                var xdata = new Date(yyyy, mm - 1, dd);
                if ((xdata.getFullYear() === yyyy) && (xdata.getMonth() === mm - 1) && (xdata.getDate() === dd)) {
                    check = true;
                } else {
                    check = false;
                }
            } else {
                check = false;
            }
            return this.optional(element) || check;
        },
        "Неверный формат даты"
    );


});