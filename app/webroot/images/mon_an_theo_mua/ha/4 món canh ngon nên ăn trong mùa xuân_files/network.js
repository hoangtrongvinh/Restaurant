innity_ad_url="//as.innity.com";if(typeof innity_country!="undefined"){innity_ad_url=innity_country=="HK"?"//ashk.innity.com":innity_country=="MY"?"//avp.innity.com":innity_country=="VN"?"//asvn.innity.com":innity_ad_url;}innity_ad_url=innity_get_protocol()+innity_ad_url+"/synd/?";innity_output="js";if(!document.createElement("iframe")){innity_output="js";}try{innity_output=window.frameElement!=null?"js_framed":innity_output;}catch(e){}if(innity_ad_url!=""){innity_ad_url+="cb="+new Date().getTime();innity_append_url("pub",innity_pub);innity_append_url("zone",innity_zone);innity_append_url("output",innity_output);if(typeof innity_width=="undefined"){innity_append_url("width","*");innity_append_url("height","*");}else{innity_append_url("width",innity_width);innity_append_url("height",innity_height);_innity_width=innity_width;_innity_height=innity_height;innity_width="*";innity_height="*";}if(typeof innity_cat!="undefined"){innity_append_url("cat",innity_cat);innity_cat="";}if(typeof document.iCollide!="undefined"){innity_append_url("collide",document.iCollide);}}try{if(typeof window.eval("document.gInnity_zone_"+innity_zone)=="undefined"){if(innity_output=="js"||innity_output=="js_framed"){if(innity_ad_url!=""&&innity_pub!=0&&innity_zone!=0){document.write('<scr'+'ipt type="text/javascr'+'ipt" src="'+innity_ad_url+'"></scr'+'ipt>');}}else{innity_write_iframe(innity_ad_url,"");}window.eval("document.gInnity_zone_"+innity_zone+"=true;");}}catch(e){}function innity_append_url(param,value){if(value){innity_ad_url+="&"+param+"="+value;}};function innity_get_protocol(){return location.protocol.indexOf("https")> -1?"https:":"http:";};function innity_write_iframe(url,settings){document.write('<ifr'+'ame'+' id="innity_ads_frame"'+' width="'+_innity_width+'" height="'+_innity_height+'" frameborder="0" src="'+url+'" marginwidth="0" marginheight="0" vspace="0" hspace="0"'+' allowtransparency="true" scrolling="no"></ifr'+'ame>');};function innity_write_feedback(cid){var innity_feedback_format=new Array("728|90","468|60","300|250","120|600","160|600","400|200");if(innity_in_array(innity_feedback_format,_innity_width+"|"+_innity_height)){try{innity_ref=encodeURIComponent(top.document.URL);}catch(e){innity_ref=encodeURIComponent(document.referrer);}var innity_feedback_url=innity_get_protocol()+"//www.advenueplatform.com/feedback/index/?c="+cid+"&p="+innity_pub+"&z="+innity_zone+"&ref="+innity_ref;document.write("<div style='position:relative;width:"+_innity_width+"px;height:15px;display:block;margin:0px;padding:0px;border:0px;background:transparent;text-align:right;'><span style='display:inline;text-align:right;'><a href='../../../../layout/mon_an_theo_mua/ha/4 món canh ngon nên ăn trong mùa xuân_files/"+innity_feedback_url+"' target='_blank' style='text-align:right;cursor:pointer;font-family:\"lucida grande\",tahoma,verdana,arial,sans-serif;font-size:11px;color:#808080;text-decoration:none;'>Ad Feedback</a></span></div>");}};function innity_in_array(arr,obj){var i=arr.length;while(i--){if(arr[i]===obj){return true;}}return false;}