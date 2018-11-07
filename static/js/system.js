var _$ = ["tbody", "#selecting", "display", "block", "#selecting", "正在查询", " 总进度", "%", "somd5_table", "somd5_table", "#selecting", "查询完毕!没有搜索到关键字数据 耗时: ", "毫秒", "#selecting", "查询完毕! 数据量:", "条 耗时:", "毫秒", "#selecting", "查询完毕! 数据量:", "条 耗时:", "毫秒", 'POST', "addRow", "select_act=", "&match_act=", "&key=", "&table=", 'ajax.php?act=select', "#somd5_table", "display", "block", "#key", '', "#key", "请输入查询内容/关键字/邮箱", "关键字长度请大于4!!", "#select_act", "#match_act", "value_tables", "没有找到您搜索的内容呢", "0"];
var somd5comdd52905dc;
var time0;
 
function addRow(a, b, c, d, e, f, g) {
    var txt = value_tables["insertRow"]();
    var row1 = txt["insertCell"](0);
    var row2 = txt["insertCell"](1);
    var row3 = txt["insertCell"](2);
    var row4 = txt["insertCell"](3);
	var row5 = txt["insertCell"](4);
	var row6 = txt["insertCell"](5);
	var row7 = txt["insertCell"](6);
    row1["innerHTML"] = a;
    row2["innerHTML"] = b;
    row3["innerHTML"] = c;
    row4["innerHTML"] = d;
	row5["innerHTML"] = e;
	row6["innerHTML"] = f;
	row7["innerHTML"] = g
};

function addRow3(a, b, c, d, e, f, g,h,i) {
    var txt = value_tables3.insertRow();
    var row1 = txt["insertCell"](0);
    var row2 = txt["insertCell"](1);
    var row3 = txt["insertCell"](2);
    var row4 = txt["insertCell"](3);
	var row5 = txt["insertCell"](4);
	var row6 = txt["insertCell"](5);
	var row7 = txt["insertCell"](6);
	var row8 = txt["insertCell"](7);
	var row9 = txt["insertCell"](8);
    row1["innerHTML"] = a;
    row2["innerHTML"] = b;
    row3["innerHTML"] = c;
    row4["innerHTML"] = d;
	row5["innerHTML"] = e;
	row6["innerHTML"] = f;
	row7["innerHTML"] = g;
	row8["innerHTML"] = h;
	row9["innerHTML"] = i;
};
 
function get_del() {
    $("tbody").empty()
};
 
function get_jdt(somd5com3de2f8f6d, somd5com738c8372f, shujukuming) {
    $("#selecting").css("display", "block");
    var somd5comf78518fb1 = (somd5com3de2f8f6d / somd5com738c8372f) * 100;
    var chaxunjindu = decimal(somd5comf78518fb1, 1);
    Administry.progress(selecting, chaxunjindu, 100, "正在查询" + shujukuming + " 总进度" + chaxunjindu + "%")
};
 
function get_okcount() {
    stend = new Date().getTime() - time0;
    var a_table = document.getElementById("my_table");
    var a_table_length = a_table.rows.length;
    if (a_table_length >= 1) {
        var b_table = document.getElementById("my_table");
        var b_table_length = b_table.rows.length;
        if (b_table_length == 2) {
            Administry.progress(selecting, 100, 100, "查询完毕!没有搜索到关键字数据 耗时: " + (stend) +"毫秒")
        } else {
            Administry.progress(selecting, 100, 100, "查询完毕! 数据量:" + (a_table_length - 2) + "条 耗时:" + (stend) + "毫秒")
        }
    } 
};
 
function decimal(somd5com3b1df0e8d, somd5comf46beb405) {
    var somd5com956a89722 = Math.pow(10, somd5comf46beb405);
    return Math.round(somd5com3b1df0e8d * somd5com956a89722) / somd5com956a89722
};
 
function ajax_post(somd5come0b7918e1, somd5comf53e662dd, somd5com25f9df3a7, somd5comb39f98f6a) {
    $.ajax({
        type: 'POST',
        url: somd5come0b7918e1,
        data: somd5comf53e662dd,
        success: function(somd5com9a3a7ef82) {
            if (somd5com9a3a7ef82.indexOf("addRow") >= 0) {
                eval(somd5com9a3a7ef82)
            };
            if (somd5com25f9df3a7 == database.length) {
                get_okcount()
            }
        }
    })
};
 
function get_data(key_value, select_act_value, match_act_value, somd5com4af3e5365, somd5comb93c3a502) {
    get_jdt(somd5comb93c3a502 + 1, somd5com4af3e5365.length, somd5com4af3e5365[somd5comb93c3a502]);
    var somd5comf53e662dd = "&select_act=" + select_act_value + "&match_act=" + match_act_value + "&key=" + key_value + "&table=" + somd5com4af3e5365[somd5comb93c3a502];
    ajax_post('ajax.php?act=select', somd5comf53e662dd, somd5comdd52905dc + 1, somd5com4af3e5365.length);
    somd5comdd52905dc = somd5comdd52905dc + 1
};
 
function getdata() {
    $("#my_table").css("display", "block");
    get_del();
    var key_value = $("#key").val();
    if (key_value == '') {
        $("#key").focus();
        alert("请输入查询内容");
        return false
    };
    if (key_value.length < 2) {
        alert("关键字长度请大于2!!");
        return false
    };
    var select_act_value = $("#select_act").val();
    var match_act_value = $("#match_act").val();
    time0 = new Date().getTime();
    somd5comdd52905dc = 0;
    for (var somd5comb93c3a502 = 0; somd5comb93c3a502 < database.length; somd5comb93c3a502++) {
        get_data(key_value, select_act_value, match_act_value, database, somd5comb93c3a502)
    }
};
 
