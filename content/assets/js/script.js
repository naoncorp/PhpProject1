$(function(){
	
	var note = $('#note'),
		ts = new Date(2013, 2, 14,23,59,0),
		newYear = true;
	
	if((new Date()) > ts){
		// Задаем точку отсчета для примера. Пусть будет очередной Новый год или дата через 10 дней.
		// Обратите внимание на *1000 в конце - время должно задаваться в миллисекундах
		//ts = (new Date()).getTime() + 10*24*60*60*1000;
		//newYear = false;
                //$('.timer').html('<h2 style="font-size: 30px; color: #597732; margin-top: 44px;">Голосование окончено</h2>')
	}
        else{
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			var sdays = days.toString();
            var shours = hours.toString();
            var sminutes = minutes.toString();
            var sseconds = seconds.toString();
            sdays = sdays.substr(sdays.length-1);
            shours = shours.substr(shours.length-1);
            sminutes = sminutes.substr(sminutes.length-1);
            sseconds = sseconds.substr(sseconds.length-1);
            
            var tdays = "";
            
            if (sdays == 1)
            {
                 if(days == 11)
                {
                    tdays = "дней";
                }
                else{
                    tdays = "день";
                }
            }
            else if (sdays == 2 | sdays == 3 | sdays == 4)
            {
                if(days == 12 | days == 13 | days == 14)
                {
                    tdays = "дней";   
                }
                else{
                    tdays = "дня";
                }
            }
            else
            {
                tdays = "дней"
            }
            
            var thours = "";
            if (shours == 1)
            {
                 if(hours == 11)
                {
                    thours = "часов";
                }
                else{
                    thours = "час";
                }
            }
            else if (shours == 2 | shours == 3 | shours == 4)
            {
                if(hours == 12 | hours == 13 | hours == 14)
                {
                    thours = "часов";   
                }
                else{
                    thours = "часа";
                }
            }
            else
            {
                thours = "часов"
            }
            
            var tminutes = "";
            if (sminutes == 1)
            {
                 if(minutes == 11)
                {
                    tminutes = "минут";
                }
                else{
                    tminutes = "минута";
                }
            }
            else if (sminutes == 2 | sminutes == 3 | sminutes == 4)
            {
                if(minutes == 12 | minutes == 13 | minutes == 14)
                {
                    tminutes = "минут";   
                }
                else{
                    tminutes = "минуты";
                }
            }
            else
            {
                tminutes = "минут"
            }
            
            var tseconds = "";
            if (sseconds == 1)
            {
                if(seconds == 11)
                {
                    tseconds = "секунд";
                }
                else{
                    tseconds = "секунда";
                }
            }
            else if (sseconds == 2 | sseconds == 3 | sseconds == 4)
            {
                if(seconds == 12 | seconds == 13 | seconds == 14)
                {
                    tseconds = "секунд";   
                }
                else{
                    tseconds = "секунды";
                }
            }
            else
            {
                tseconds = "секунд"
            }
            
			message += days + " " + tdays + ", ";
			message += hours + " " + thours + ", ";
			message += minutes + " " + tminutes + " и ";
			message += seconds + " " + tseconds + " <br />";
			
			if(newYear){
				message += "";
			}
			else {
				message += "осталось до момента через 10 дней!";
			}
			
			//note.html(message);
            $('.textDays').html(tdays);
            $('.textHours').html(thours);
            $('.textMinutes').html(tminutes);
            $('.textSeconds').html(tseconds);
		}
	});
	}
});
