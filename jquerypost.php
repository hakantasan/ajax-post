<!DOCTYPE html>
<html lang="tr">
    <head> 
        <meta charset="utf-8">
        <title>Ders Örnekleri</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
            function kayit()
            {
                var mail  = $("input[name=mail]").val();
                var kadi  = $("input[name=kadi]").val();
                var sifre = $("input[name=sifre]").val();

                mail  = jQuery.trim(mail);
                kadi  = jQuery.trim(kadi);
                sifre = jQuery.trim(sifre);

                var atpos=mail.indexOf("@");
                var dotpos=mail.lastIndexOf(".");

                if(kadi == "")
                {
                    var newHTML = "<div style='color: red;'> *Kullanıcı Adı Girin </div>";   
                    document.getElementById("uyari").innerHTML=newHTML;
                }
                else if(sifre == "")
                {
                    var newHTML = "<div style='color: red;'> *Şifre Girin </div>";   
                    document.getElementById("uyari").innerHTML=newHTML;
                }
                else if(mail == "")
                {
                    var newHTML = "<div style='color: red;'> *E-Mail Girin </div>";   
                    document.getElementById("uyari").innerHTML=newHTML;
                }
                else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=mail.length)
                {
                    var newHTML = "<div style='color: red;'> *Geçerli email değil </div>";   
                    document.getElementById("uyari").innerHTML=newHTML;
                }
                else
                {
                    $.ajax(
                        {       
                            type: "POST",
                            url:  "jquerypost2.php",
                            data : {post_mail : mail, post_kadi : kadi, post_sifre : sifre},
                            success: function(sonuc){
                                if(sonuc == 'Kaydınız yapıldı')
                                {
                                    var newHTML = "<div style='color: green;'> *Üyeliğiniz kaydedildi </div>";   
                                    document.getElementById("uyari").innerHTML=newHTML;
                                }  
                            }
                        }
                    )
                }
            }
        </script>          
    </head>
    <body>       
        Kullanıcı Adı:  <input type="text" name="kadi">  <br>
        Şifre:  <input type="password" name="sifre">     <br>
        Mail:  <input type="text" name="mail">           <br>
        <button type="submit" onclick="kayit()">Kaydol</button>
        <div id="uyari"></div>  
    </body>
</html>
