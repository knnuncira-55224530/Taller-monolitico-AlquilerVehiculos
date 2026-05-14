<?php
// app/views/layouts/header.php
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RentCar Manager</title>

    <!-- CSS -->
    <link rel="stylesheet"
          href="/Taller-monolitico-AlquilerVehiculos/public/css/styles.css?v=1">

    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <style>

        /* ===== RESET ===== */

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Segoe UI', sans-serif;
            background:#0f172a;
            color:#e2e8f0;
        }

        /* ===== HEADER ===== */

        header{
            background:linear-gradient(90deg,#111827,#1e293b);
            padding:20px 40px;
            box-shadow:0 4px 15px rgba(0,0,0,0.3);
            position:sticky;
            top:0;
            z-index:100;
        }

        .top-bar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            flex-wrap:wrap;
            gap:20px;
        }

        .logo{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .logo h1{
            font-size:2rem;
            color:#38bdf8;
            letter-spacing:1px;
        }

        .logo span{
            font-size:2.2rem;
        }

        /* ===== NAV ===== */

        nav{
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .btn-nav{
            text-decoration:none;
            color:white;
            background:rgba(255,255,255,0.08);
            padding:12px 18px;
            border-radius:12px;
            transition:0.3s ease;
            border:1px solid transparent;
            font-weight:600;
        }

        .btn-nav:hover{
            background:#38bdf8;
            color:#0f172a;
            transform:translateY(-2px);
        }

        /* ===== MAIN ===== */

        main{
            padding:40px;
        }

        /* ===== RESPONSIVE ===== */

        @media(max-width:768px){

            .top-bar{
                flex-direction:column;
                align-items:flex-start;
            }

            nav{
                width:100%;
            }

            .btn-nav{
                width:100%;
                text-align:center;
            }

            main{
                padding:20px;
            }
        }

    </style>

</head>

<body>

<header>

    <div class="top-bar">

        <div class="logo">
            <span>🚗</span>
            <h1>RentCar Manager</h1>
        </div>

        <nav>

            <a href="/Taller-monolitico-AlquilerVehiculos/public/"
               class="btn-nav">
               Vehículos
            </a>

            <a href="/Taller-monolitico-AlquilerVehiculos/public/?module=clientes"
               class="btn-nav">
               Clientes
            </a>

            <a href="/Taller-monolitico-AlquilerVehiculos/public/?module=reservas"
               class="btn-nav">
               Reservas
            </a>

        </nav>

    </div>

</header>

<main>