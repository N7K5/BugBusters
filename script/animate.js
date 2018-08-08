





//*******************************
//@@@ FOR THE RIGHT TERMINAL  @@@
//*******************************

var codes= ["function crackSite( var cookies);", "for(i=0; i<n; i++)<br /> do crack||notDone", "if(HackIsPossible)<br /><br />do hack(x, MynumCrxks);", "array myAray= new array(5)<br />", "document.cookie='UL_=7854sa8wq3sd'", "SELECT nodes From database Where user Exhist", "mainfunctionx.prototype.supports = function(prop);", "prop = prop.replace(/^[a-z]/, function(val);", "this.el.main.append(prev, next);", "navigation.find('a').click(function(e)","dataString data= new dataString();"];
var codes_data=["start_here"];
for(var i=0;i<50;i++)
	codes_data[i]=codes[Math.floor((Math.random() * 10) + 1)];

function show_right_codes()
{
	var rand_no=Math.floor((Math.random() * 10) + 1);
	for(var i=0;i<49;i++)
	{
		codes_data[i]=codes_data[i+1];
	}
	codes_data[49]=codes[rand_no];
	var myHtml="Trace Script Running...";
	for(i=0;i<50;i++)
		myHtml+="<br />"+codes_data[i];
	document.getElementById("right_bar").innerHTML=myHtml;
	document.getElementById("right_bar").scrollTop+=999;
}

//setInterval(show_right_codes, 180);

//***************************
//@@@ RIGHT TERMINAL ENDS @@@
//***************************



//****************************
//@@@ MAIN TERMINAL STARTS @@@
//****************************


var term_main="bugbusters@gcelt:~ ";
var term_line_1="Enter Your Name   ";
var blinker='<a class="blinking_bar">▓</a>';

var main_block= document.getElementsByClassName("termip")[0];
main_block.innerHTML=term_main+term_line_1+blinker;
var enc_arr=["@", "#", "$", "p", "&", "*", "a", "f", "e", "t", "=", "e"];
var take_value_stage=0;
var uname="";
var uid="";
var ani_out;
var show_enter_popup_count=0;

function show_enter_popup()
{
	var enter_codes=["Initializing...", "Verifing user data...","<a id=\"wrn\">Oops! Looks like somone has already been in your account ! </a>","","","","", "Take it easy, It was just a punch to relax you before the mega event !","wait while we register you as a verified hacker!","verify Done Successfully with 0 errors...", "Cheaking if There is any network loops", "Cheak Success, No loopholes found...", "Found Network as http...Trying to fetch https", "Warning...will fetch data using Less secure http protocol", "Please Wait While Encripting Your Data", "data String Encripted with AES-256", "Generating Algorithms...", "Generating Secure AXF-32", "Finalizing generation of pages", "Creating Start Button", "Done....."];
	if(show_enter_popup_count==0)
		main_block.innerHTML="";
	if(enter_codes[show_enter_popup_count]!="")
	{
		//alert(show_enter_popup_count);
		main_block.innerHTML+="<br />"+enter_codes[show_enter_popup_count];
	}
	if(show_enter_popup_count==2)
	{
		document.getElementById("wrn").style.color="red";
	}
	if(show_enter_popup_count==7)
	{
		document.getElementById("wrn").style.color="";
	}
	if(show_enter_popup_count==(enter_codes.length-1))
	{
		clearInterval(ani_out);
		document.getElementById("ip_name").value=uname;
		document.getElementById("ip_id").value=uid;
		document.getElementById("ip_btn").style.display="inline-block";
		document.getElementById("welcome_tag").innerHTML="now Click on start...";
	}
	show_enter_popup_count++;
}

function show_enter_popup_false()
{
	var enter_codes=["Initializing...", "Verifing user data...","<a id=\"wrn\">Oops! The Unique ID You Entered Doesnot Match...!! </a>","","","","Restarting Console...","", "", "", ""]; 
	if(show_enter_popup_count==0)
		main_block.innerHTML="";
	if(enter_codes[show_enter_popup_count]!="")
	{
		//alert(show_enter_popup_count);
		main_block.innerHTML+="<br />"+enter_codes[show_enter_popup_count];
	}
	if(show_enter_popup_count==2)
	{
		document.getElementById("wrn").style.color="red";
	}

	if(show_enter_popup_count==(enter_codes.length-1))
	{
		clearInterval(ani_out);
		main_block.innerHTML=term_main+"Enter Your Name "+blinker;
		document.getElementById("text_inputs").value="";
		show_enter_popup_count=0;
		take_value_stage=0;
		return;
	}
	show_enter_popup_count++;
}

function show_encription(stage_val)
{
	if(stage_val==0)
	{
		
		for(var loop=0; loop<20; loop++)
		{
			var enc_tmp="";
			for(i=0; i<=uname.length+2; i++)
				enc_tmp+=enc_arr[Math.floor((Math.random() * 10) + 1)];
			main_block.innerHTML=term_main+term_line_1+enc_tmp;
			//sleep(100);
		}
	}
}

function ip_focus()
{
	document.getElementsByClassName("termip")[0].style.borderColor="#23D713";
	document.getElementsByClassName("termip")[0].style.color="#23D713";
	blinker='<a class="blinking_bar_active">_</a>';
	document.getElementById("term_main_head").style.borderColor="#23D713";
	document.getElementById("term_main_head").style.backgroundColor="#6f6f6f";
	document.getElementById("red_term").style.backgroundColor="#F90606";
	document.getElementById("yellow_term").style.backgroundColor="#F9F106";
	document.getElementById("green_term").style.backgroundColor="#47F906";
	//document.getElementById("text_inputs").focus();
	take_input();
}

function ip_blur()
{
	document.getElementsByClassName("termip")[0].style.borderColor="";
	document.getElementsByClassName("termip")[0].style.color="green";
	blinker='<a class="blinking_bar">▓</a>';
	document.getElementById("term_main_head").style.borderColor="green";
	document.getElementById("term_main_head").style.backgroundColor="#555555";
	document.getElementById("red_term").style.backgroundColor="#D30202";
	document.getElementById("yellow_term").style.backgroundColor="#DBD402";
	document.getElementById("green_term").style.backgroundColor="#42E108";
	//document.getElementById("text_inputs").focus();
	take_input();
}

function take_input()
{
	//alert("aa");
	var value=document.getElementById("text_inputs").value;
	if(value.length==1 && value[0]=='\n')
	{
		document.getElementById("text_inputs").value="";
		return ;
	}
	//alert("aa"+value[value.length-1]+"aa");
	if(value[value.length-1]=="\n" && value.length>3)
	{
		var ipflag=0;

		if(take_value_stage==0)
		{
			for(i=0;i<value.length-1;i++)
				uname=uname+value[i];
			//alert(uname+"aa");

			//show_encription(0);
			ipflag=1;

		}
		
		if(take_value_stage==1)
		{
			uid="";
			for(i=0;i<value.length-1;i++)
				uid+=value[i];
			//alert(uid+" aa");

			var xhr= new XMLHttpRequest();
			xhr.open("GET", "cheak_uid.php?uid="+uid, false);
			//console.log("cheak_uid.php?uid="+uid);
			main_block.innerHTML="Processing...";
			xhr.send();
			if(xhr.responseText.toString()==0)
			{
				ani_out=setInterval(show_enter_popup_false, 600);
			}
			else if(xhr.responseText.toString()==1)
			{
				ani_out=setInterval(show_enter_popup, 600);
			}
		}
		
		take_value_stage++;
		document.getElementById("text_inputs").value="";
		if(ipflag==1)
		{
			ipflag=0;
			take_input();
		}

		return ;
	}
	if(take_value_stage==0)
	{
		main_block.innerHTML=term_main+term_line_1+value+blinker;
	}
	if(take_value_stage==1)
	{
		main_block.innerHTML=term_main+term_line_1+" ";
		for(i=0;i<uname.length; i++)
			main_block.innerHTML+="*";
		main_block.innerHTML+="<br /> got your name as "+uname.length+" Char Variable<br />"+"<br /> Enter Your ID- ";
		for(i=0;i<value.length-1;i++)
			main_block.innerHTML+="*";
		if(value.length>0)
			main_block.innerHTML+=value[value.length-1];
		main_block.innerHTML+=blinker;
	}
}

document.getElementById("text_inputs").addEventListener("keyup", take_input, false);
document.getElementById("text_inputs").addEventListener("focus", ip_focus, false);
document.getElementById("text_inputs").addEventListener("blur", ip_blur, false);
//document.getElementById("term_main_head").addEventListener("focus", ip_focus, false);
//document.getElementById("term_main_head").addEventListener("blur", ip_blur, false);
/*window.addEventListener("load", function(){
	document.getElementById("text_inputs").focus();
}, false);*/


//****************************
//@@@ ENF OF MAIN TERMINAL @@@
//****************************

//****************************
//@@@ LEFT CODES ANIMATION @@@
//****************************


document.getElementById("left_code").innerHTML='';
var l_data='';
var l_codes='if ( bugBusters.<a class="fn">win</a> ) {<br /><a class="tab1">GCELT.<a class="fn">getPrize( )</a> ;</a><br /><a class="tab1">friends.<a class="fn">beFamous( )</a> ;</a><br /><a class="tab1"><a class="val">Certified</a> = true ;</a><br /><a class="tab1"><a class="fn">rest ( <span class="val">14</span> )</a></a> ;<br />}<br />else {<br /><a class="tab1"><a class="val">Experience</a> + + ;</a><br /><a class="tab1"><a class="val">Knowledge</a> + + ;</a><br /><a class="tab1"><a class="val">hadFun</a> = true ;</a><br />}<br /><br /><a class="fn">function </a> rest (<a class="val"> time </a>) {<br /><a class="tab1">var <a class="val">sec</a> = 3600 * <a class="val">time</a> ;</a><br /><a class="tab1"><a class="fn">sleep ( <span class="val">sec</span> )</a> ;</a><br />}';
var left_code_len=0;

function add_left_code()
{
	if(l_codes[left_code_len]!='<')
		l_data+=l_codes[left_code_len];
	else
	{
		while(l_codes[left_code_len]!='>')
		{
			l_data+=l_codes[left_code_len];
			left_code_len++;
		}
		l_data+=l_codes[left_code_len];
	}
	left_code_len++;
	if(l_codes.length!=left_code_len)
		document.getElementById("left_code").innerHTML=l_data+'<a class="left_bar_cur"> _ </a>';
	else
	{
		document.getElementById("left_code").innerHTML=l_data;
		clearInterval(l_code_int);
	}
}
//document.getElementById("left_code").innerHTML=l_data;

var l_code_int;
//l_code_int = setInterval(add_left_code, 50);


//**********************************
//@@@ END OF LEFT CODE ANIMATION @@@
//**********************************

//**************************
//@@@ STARTING BLUR HIDE @@@
//**************************

function hide_blur()
{
	var body_m = document.getElementById("body_m");
	setTimeout(function(){
		body_m.style.filter="blur(0px)";
		document.getElementById("time_m").style.display="none";
		document.getElementById("time_h").style.display="none";
		document.getElementById("welcome_tag").innerHTML="READY BUGBUSTERS...??";
		document.getElementById("welcome_tag").style.animationName="show_title";
		l_code_int = setInterval(add_left_code, 90);
		document.getElementById("text_inputs").focus();
	}, 1100);
	document.getElementById("time_m").style.animationName="hide_m";
	document.getElementById("time_h").style.animationName="hide_h";
	document.getElementById("time_devider").style.display="none";
	setInterval(show_right_codes, 180);
	clearInterval(elTime);

	window.removeEventListener("click", hide_blur);
	window.removeEventListener("keypress", hide_blur);
}

window.addEventListener("click", hide_blur, false);
window.addEventListener("keypress", hide_blur, false);



//*********************************
//@@@ END OF STARTING BLUR HIDE @@@
//*********************************


//*************************
//@@@ SHOW CURRENT TIME @@@
//*************************

function show_time()
{
	var dt= new Date();
	var time_m= dt.getMinutes().toString();
	var time_h= dt.getHours().toString();
	if(time_h.length==1)
	{
		time_h='0'+time_h;
	}
	if(time_m.length==1)
	{
		time_m='0'+time_m;
	}

	document.getElementById("time_m").innerHTML=time_m;
	document.getElementById("time_h").innerHTML=time_h;
}
var elTime=setInterval(show_time, 5000);
show_time();

//************************
//@@@ END OF SHOW TIME @@@
//************************
