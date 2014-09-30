$(document).ready(function() {
    
   
    
    $("#datePicker_1").datepicker({
        showOn: "button",
        changeMonth: false,
        numberOfMonths: 1,
        minDate: -21,
        maxDate: 0,
        buttonImage: "image/calendar.gif",
        buttonImageOnly: true
    });

    $("#weekOfSundayDate_1").datepicker({
        showOn: "button",
        buttonImage: "image/calendar.gif",
        buttonImageOnly: true
    });


    $("#searchFrom").datepicker({
        showOn: "button",
        dateFormat: "yy-mm-dd",
        buttonImage: "image/calendar.gif",
        buttonImageOnly: true,
        changeMonth: true,
        changeYear: true
    });

    $("#searchTo").datepicker({
        showOn: "button",
        dateFormat: "yy-mm-dd",
        buttonImage: "image/calendar.gif",
        buttonImageOnly: true,
        changeMonth: true,
        changeYear: true
    });





});


var curPage = 1; //the current page number
var total, pageSize, totalPage;
var listPerPage = 10;
//get data
function getData(page, pageSize1, searchFrom, searchTo, searchName, searchDept, approved, locked) {
    $.ajax({
        type: 'POST',
        url: 'getData.php',
        data: {
            'pageNum': page - 1,
            'pageSize': pageSize1,
            'searchFrom': searchFrom,
            'searchTo': searchTo,
            'searchName': searchName,
            'searchDept': searchDept,
            'approved': approved,
            'locked': locked
        },
        dataType: 'json',
        beforeSend: function() {
            $("#list").append("<label id='loading'>loading...</label>");
        },
        success: function(json) {
            $("#list").empty();
            total = json.total; //total records number
            pageSize = json.pageSize; //number of per page
            curPage = page; //current page
            totalPage = json.totalPage; //total pages
           //alert(json.sql); //this is only for test
            yesimg = '<img src="image/yes.png" width="12px" height="12px">';
            noimg = '<img src="image/no.png" width="14px" height="14px">';
            var str = "";
            var list = json.list;
            //create display table                            
            str += "<table id='table-6'>";
            str += "<thead><th><a href=javascript:SortTable(0,'T');>User</th><th><a href=javascript:SortTable(1,'T');>Approved?</th><th><a href=javascript:SortTable(2,'T');>Locked?</th><th><a href=javascript:SortTable(3,'T');>Dept</th><th><a href=javascript:SortTable(4,'D','ymd');>Date</th></thead>";
            str += "<tbody>";
            //display result
            if (total > 0)
            {
                $.each(list, function(index, array) { //display json data
                    if (array['approved'] == 1)
                        array['approved'] = yesimg + " Yes";
                    else
                        array['approved'] = noimg + " No";
                    if (array['locked'] == 1)
                        array['locked'] = yesimg + " Yes";
                    else
                        array['locked'] = noimg + " No";
                    str += "<tr><td><a href='devlogDetailView.php?uid=" + array['devlog_id'] + "'target='_blank'</a>" + array['username'] + "</td><td>" + array['approved'] + "</td><td>" + array['locked'] + "</td><td>" + array['deptName'] + "</td><td>" + array['today_date'] + "</td></tr>";
                }

                );
            } else

            {
                alert("There is no result returned, please check your input");
            }

            ;

            str += "</tbody></table>";
            $("#list").append(str);
        },
        complete: function() { //get pagination
            getPageBar();
        },
        error: function() {
            //alert(json.sql);//this is only for test
            alert("loading data failed");
        }
    });
}


//get pagination
function getPageBar() {
    var link = "";
    var start_loop;
    var end_loop;
    //goto button
    var goto = "<input type='text' id='go_txt' size='1' style='margin-top:-1px;margin-left:60px;'/><input type='button' id='go_btn' value='Go'/>";
    //Calculating the starting and endign values for the loop-
    if (curPage >= listPerPage) {
        start_loop = curPage - 5;
        if (totalPage > curPage + 5)
            end_loop = curPage + 5;
        else if (curPage <= totalPage && curPage > totalPage - 6) {
            start_loop = totalPage - 9;
            end_loop = totalPage;
        } else {
            end_loop = totalPage;
        }
    } else {
        start_loop = 1;
        if (totalPage > listPerPage)
            end_loop = listPerPage;
        else
            end_loop = totalPage;
    }

    //create number links,eg: 1,2,3,4,5,6,7
    for (var i = start_loop; i <= end_loop; i++) {

        if (curPage == i)
            link = link + "<span><a style='color:#fff;background-color:#006699;' href='javascript:void(0)' rel='" + i + "'>" + i + "</a></span>";
        else
            link = link + "<span><a href='javascript:void(0)' rel='" + i + "'>" + i + "</a></span>";
    }

    //page number greater than total page number
    if (curPage > totalPage)
        curPage = totalPage;
    //page number less than 1
    if (curPage < 1)
        curPage = 1;
    pageStr = "<span>Total  " + total + "  Redords</span><span>  " + curPage + "/" + totalPage + "  </span>";

    //the first page
    if (curPage == 1) {
        pageStr += "<span>First  </span><span>  Pervious    </span>" + link;
    } else {
        pageStr += "<span><a href='javascript:void(0)' rel='1'>    First</a></span><span><a href='javascript:void(0)' rel='" + (curPage - 1) + "'>     Previous</a></span>" + link;
    }

    //the last page
    if (curPage >= totalPage) {
        pageStr += "<span>Next</span><span>Last</span><span>" + goto + "</span>";
    } else {
        pageStr += "<span><a href='javascript:void(0)' rel='" + (parseInt(curPage) + 1) + "'>     Next</a></span><span><a href='javascript:void(0)' rel='" + totalPage + "'>     Last</a></span><span>" + goto + "</span>";
    }

    $("#pagecount").html(pageStr);
}


//RESET button
function clear_form_elements(ele) {
    $(ele).find(':input').each(function() {
        switch (this.type) {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'text':
            case 'textarea':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });

}
