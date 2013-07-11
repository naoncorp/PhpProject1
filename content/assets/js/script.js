$(function(){
	
	var note = $('#note'),
		ts = new Date(2013, 2, 14,23,59,0),
		newYear = true;
	
	if((new Date()) > ts){
		// ������ ����� ������� ��� �������. ����� ����� ��������� ����� ��� ��� ���� ����� 10 ����.
		// �������� �������� �� *1000 � ����� - ����� ������ ���������� � �������������
		//ts = (new Date()).getTime() + 10*24*60*60*1000;
		//newYear = false;
                //$('.timer').html('<h2 style="font-size: 30px; color: #597732; margin-top: 44px;">����������� ��������</h2>')
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
                    tdays = "����";
                }
                else{
                    tdays = "����";
                }
            }
            else if (sdays == 2 | sdays == 3 | sdays == 4)
            {
                if(days == 12 | days == 13 | days == 14)
                {
                    tdays = "����";   
                }
                else{
                    tdays = "���";
                }
            }
            else
            {
                tdays = "����"
            }
            
            var thours = "";
            if (shours == 1)
            {
                 if(hours == 11)
                {
                    thours = "�����";
                }
                else{
                    thours = "���";
                }
            }
            else if (shours == 2 | shours == 3 | shours == 4)
            {
                if(hours == 12 | hours == 13 | hours == 14)
                {
                    thours = "�����";   
                }
                else{
                    thours = "����";
                }
            }
            else
            {
                thours = "�����"
            }
            
            var tminutes = "";
            if (sminutes == 1)
            {
                 if(minutes == 11)
                {
                    tminutes = "�����";
                }
                else{
                    tminutes = "������";
                }
            }
            else if (sminutes == 2 | sminutes == 3 | sminutes == 4)
            {
                if(minutes == 12 | minutes == 13 | minutes == 14)
                {
                    tminutes = "�����";   
                }
                else{
                    tminutes = "������";
                }
            }
            else
            {
                tminutes = "�����"
            }
            
            var tseconds = "";
            if (sseconds == 1)
            {
                if(seconds == 11)
                {
                    tseconds = "������";
                }
                else{
                    tseconds = "�������";
                }
            }
            else if (sseconds == 2 | sseconds == 3 | sseconds == 4)
            {
                if(seconds == 12 | seconds == 13 | seconds == 14)
                {
                    tseconds = "������";   
                }
                else{
                    tseconds = "�������";
                }
            }
            else
            {
                tseconds = "������"
            }
            
			message += days + " " + tdays + ", ";
			message += hours + " " + thours + ", ";
			message += minutes + " " + tminutes + " � ";
			message += seconds + " " + tseconds + " <br />";
			
			if(newYear){
				message += "";
			}
			else {
				message += "�������� �� ������� ����� 10 ����!";
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
