<!DOCTYPE html>
<html lang="en">

<head>
  <title>Making Accessible Emails</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* RESET STYLES */
    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }

    table {
      border-collapse: collapse !important;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }
  </style>
</head>

<body style="background-color: aliceblue; margin: 0 !important; padding: 60px 0 60px 0 !important;">
  <table border="0" cellspacing="0" cellpadding="0" role="presentation" width="100%">
    <tr>
      <td bgcolor="aliceblue" style="font-size: 0;">&​nbsp;</td>
      <td bgcolor="white" width="600"
        style="border-radius: 4px; color: grey; font-family: sans-serif; font-size: 18px; line-height: 28px; padding: 40px 40px;">
        
        
          

        <article>

        <img alt="placeholder image" src="https://www.hawaiinewsnow.com/resizer/9t9s3UdBOgqF8I5kATkDpM02fLM=/1200x600/arc-anglerfish-arc2-prod-raycom.s3.amazonaws.com/public/6FM5CNL2TBH4NAPFSHGPE4WA5I.jpg" height="300" width="600"
            style="background-color: black; color: white; display: block; font-family: sans-serif; font-size: 18px; font-weight: bold;
             height: auto; max-width: 100%; text-align: center; width: 100%;">
          <h2 style="color: black; font-size: 28px; font-weight: bold; line-height: 36px; margin: 30px 0 30px 0;">
          {{ $files[0]->requirements_name ?? 'Req. Scotty Hodkiewicz' }}
        </h1>

        <p>{{ $files[0]->requirements_description ?? 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea quisquam,
            perferendis, non ratione pariatur quam quidem ad temporibus magni sed veritatis autem iure eligendi soluta
            blanditiis provident reprehenderit magnam. Facere!' }}</p>
            
        <p style="text-align: center;"><b>{{ ($isPast)?'Late '.$left.' days':$left.' days left' }}</b></p>

        <div style="with: 100%; background: gray; border-radius: .5rem; -webkit-border-radius: .5rem;">
          <div  style="display: block; width: {{ $progress }}%; background-color: red; color: white; text-align: center; border-radius: .5rem {{($progress==100)?'':'0 0 .5rem'}}; -webkit-border-radius: .5rem {{($progress==100)?'':'0 0 .5rem'}};" >&nbsp</div>
        </div>

        <div style="display: flex; flex-flow: row; justify-content: space-between;">
          <span>Started: <b>{{\Carbon\Carbon::parse($files[0]->processes_created_at)->format('M d Y')}}</b> </span>
          <span>Deadline: <b>{{\Carbon\Carbon::parse($files[0]->processes_created_at)->addDays(
                              $files[0]->requirements_days
                          )->format('M d Y')}}</b></span>
        </div>


        <ul style="list-style-type: none; margin: 30px 0 30px 0; padding: 0px"> 
          @if (isset($files) && count($files) > 0)
              @foreach ($files as $file)
                  <li style="border: 2px solid gray; padding: .5rem; border-radius: .5rem ; -webkit-border-radius: .5rem; margin: 0px 0px 1rem 0px;">
                      <span>
                          <span><b> #F{{$file->file_type_id}} - {{$file->file_type_name}}</b></span>
                          
                        </span>
                      @if($file->file_name == null)
                        (Pending)
                      @else
                        (---OK---)
                      @endif
                     
                  </li>
              @endforeach
          @else

          @endif
          

          <h2>We make it easy</h2>
          <p style="margin: 0 0 30px 0;">We want to help you making your life lighter. That is why we send you this email to remaind you upload the files we need for  <b>{{ $files[0]->requirements_name ?? 'Req. Scotty Hodkiewicz' }}</b> requirement.</p>


          <p style="margin: 30px 0 30px 0; text-align: center;">
            <a href="https://thebetter.email" target="_blank"
              style="font-size: 18px; font-family: sans-serif; color: #ffffff; text-decoration: none; border-radius: 8px; -webkit-border-radius: 8px; background-color: dodgerblue; border-top: 20px solid dodgerblue; border-bottom: 18px solid dodgerblue; border-right: 40px solid dodgerblue; border-left: 40px solid dodgerblue; display: inline-block;">
              Upload pending files here &rarr;
            </a>
          </p>
          
            
        </article>
      </td>
      <td bgcolor="aliceblue" style="font-size: 0;">&​nbsp;</td>
    </tr>
  </table>
</body>

</html>