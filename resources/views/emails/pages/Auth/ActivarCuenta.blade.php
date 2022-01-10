@extends('emails.layout.shared.layout')

@section('styles-section')
    @include('emails.layout.shared.styles')
@endsection

@section('content-section')

    <body bgcolor="#f7f7f7">
        <table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
            <tr>
                <td align="left" valign="top" width="100%" style="background:repeat-x url(http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg) #ffffff;">
                <center>
                <img src="http://s3.amazonaws.com/swu-filepicker/SBb2fQPrQ5ezxmqUTgCr_transparent.png" class="force-width-gmail">
                    <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" background="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" style="background-color:transparent">
                    <tr>
                        <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">
                        <!--[if gte mso 9]>
                        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:80px; v-text-anchor:middle;">
                        <v:fill type="tile" src="http://s3.amazonaws.com/swu-filepicker/4E687TRe69Ld95IDWyEg_bg_top_02.jpg" color="#ffffff" />
                        <v:textbox inset="0,0,0,0">
                        <![endif]-->
                        <center>
                            <table cellpadding="0" cellspacing="0" width="600" class="w320">
                            <tr>
                                <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;">
                                Leptus
                                <td>
                            </tr>
                            </table>
                        </center>
                        <!--[if gte mso 9]>
                        </v:textbox>
                        </v:rect>
                        <![endif]-->
                        </td>
                    </tr>
                    </table>
                </center>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
                <center>
                    <table cellspacing="0" cellpadding="0" width="600" class="w320">
                    <tr>
                        <td class="header-lg">
                        Bienvenido a Leptus
                        </td>
                    </tr>
                    <tr>
                        <td class="free-text">
                        <span><a href=""> {{ $request->email }}</a></span> se ha registrado correctamente.
                        </td>
                    </tr>
                    <tr>
                        <td class="mini-block-container">
                        <table cellspacing="0" cellpadding="0" width="100%"  style="border-collapse:separate !important;">
                            <tr>
                            <td class="mini-block">
                                <table cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td>
                                    <table cellspacing="0" cellpadding="0" width="100%">
                                        <tr>
                                        <td class="user-img">
                                            <a href=""><img class="user-img" src="http://s3.amazonaws.com/swu-filepicker/Ei7o4zRgT561k4rLfzTz_profile_pic.jpg" alt="user img" /></a>
                                            <br /><a href="">{{$email}}</a>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td class="user-msg">
                                            "{{ $request->nombres }},
                                            Para activar su cuenta ingrese al siguiente enlace por favor:
                                        </td>
                                        </tr>
                                    </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="button">
                                    <div><!--[if mso]>
                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word"
                                        href="https://leptus-peru.netlify.app/activate-account/{{$email}}/{{$tokenActivacion}}" style="height:45px;v-text-anchor:middle;width:155px;" arcsize="15%" strokecolor="#ffffff" fillcolor="#473FCE">
                                        <w:anchorlock/>
                                        <center style="color:#ffffff;font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;">Cambiar Contraseña</center>
                                        </v:roundrect>
                                    <![endif]--><a href="https://leptus-peru.netlify.app/activate-account/{{$email}}/{{$tokenActivacion}}"
                                    style="background-color:#473FCE;border-radius:5px;color:#ffffff;display:inline-block;font-family:'Cabin', Helvetica, Arial, sans-serif;font-size:14px;font-weight:regular;line-height:45px;text-align:center;text-decoration:none;width:155px;-webkit-text-size-adjust:none;mso-hide:all;">Cambiar Contraseña</a></div>
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    </table>
                </center>
                </td>
            </tr>
        </table>
    </body>

@endsection
