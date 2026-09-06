<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Territorios que Transforman | Economía Circular</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        /* ========================================
           CONFIGURACIÓN GENERAL
        ======================================== */

        :root {
            --verde-oscuro: #1f4f3d;
            --verde-principal: #286148;
            --verde-medio: #3d725a;
            --verde-claro: #e8f0eb;
            --verde-lima: #c7e96b;

            --rojo: #ed0033;
            --azul: #29396f;

            --blanco: #ffffff;
            --fondo-claro: #fafcfb;
            --texto: #29352f;
            --gris: #64706a;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-snap-type: y proximity;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: var(--fondo-claro);
        }


        /* ========================================
           HOJAS
        ======================================== */

        .hoja {
            min-height: 100vh;
            width: 100%;
            scroll-snap-align: start;

            display: flex;
            align-items: center;

            position: relative;
            overflow: hidden;
        }

        .contenido-hoja,
        .contenido-final {
            width: min(1050px, 100%);
            margin: 0 auto;
            padding: 80px 50px;

            position: relative;
            z-index: 2;
        }


        /* ========================================
           ANIMACIÓN
        ======================================== */

        .hoja .contenido-hoja,
        .hoja .contenido-final {
            opacity: 0;
            transform: translateY(30px);

            transition:
                opacity 1.2s ease-out,
                transform 1.2s ease-out;
        }

        .hoja.visible .contenido-hoja,
        .hoja.visible .contenido-final {
            opacity: 1;
            transform: translateY(0);
        }


        /* ========================================
           CÍRCULOS DECORATIVOS - HOJAS BLANCAS
        ======================================== */

        .hoja-blanca::before {
            content: "";

            position: absolute;
            width: 330px;
            height: 330px;

            top: -165px;
            right: -100px;

            border-radius: 50%;

            background:
                rgba(40, 97, 72, 0.10);

            z-index: 1;
        }

        .hoja-blanca::after {
            content: "";

            position: absolute;
            width: 250px;
            height: 250px;

            bottom: -140px;
            left: -100px;

            border-radius: 50%;

            background:
                rgba(40, 97, 72, 0.08);

            z-index: 1;
        }


        /* ========================================
           CÍRCULOS DECORATIVOS - HOJAS VERDES
        ======================================== */

        .hoja-verde::before {
            content: "";

            position: absolute;
            width: 360px;
            height: 360px;

            top: -180px;
            right: -120px;

            border-radius: 50%;

            background:
                rgba(255, 255, 255, 0.07);

            z-index: 1;
        }

        .hoja-verde::after {
            content: "";

            position: absolute;
            width: 270px;
            height: 270px;

            bottom: -150px;
            left: -110px;

            border-radius: 50%;

            background:
                rgba(199, 233, 107, 0.10);

            z-index: 1;
        }


        /* ========================================
           HOJAS BLANCAS
        ======================================== */

        .hoja-blanca {
            background: var(--blanco);
        }


        /* ========================================
           HOJAS VERDES
        ======================================== */

        .hoja-verde {
            background:
                linear-gradient(
                    135deg,
                    var(--verde-oscuro),
                    var(--verde-principal)
                );
        }


        /* ========================================
           PORTADA
        ======================================== */

        .portada {
            background: var(--blanco);
        }


        /* ========================================
        LOGOS
        ======================================== */

        .logo-contenedor {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 20px;
            margin-bottom: 38px;
        }

        .logo-gobernacion,
        .logo-uniempresarial {
            display: block;
            width: auto;
            height: 100px;
            max-width: 45%;
            object-fit: contain;
        }


        /* ========================================
           TITULO PRINCIPAL
        ======================================== */

        .titulo-principal {
            margin: 0 0 14px;

            color: var(--azul);

            font-size: clamp(2.8rem, 5vw, 4.8rem);
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .titulo-principal span {
            color: #5f8f45;
        }

        .subtitulo {
            margin: 0 0 30px;

            color: #405047;

            font-size: clamp(1.3rem, 2.2vw, 1.9rem);
            line-height: 1.3;
            font-weight: 400;
        }

        .linea-roja {
            width: 90px;
            height: 4px;

            margin-bottom: 28px;

            background: var(--rojo);
        }

        .linea-verde {
            width: 80px;
            height: 4px;

            margin: 20px 0 30px;

            background: var(--verde-principal);
        }

        .linea-lima {
            width: 80px;
            height: 4px;

            margin: 20px 0 35px;

            background: var(--verde-lima);
        }

        .texto-principal {
            max-width: 850px;
            margin: 0 0 20px;
            text-align: justify;
            color: var(--texto);
            font-size: 1.05rem;
            line-height: 1.7;
        }


        /* ========================================
           INDICACIÓN DE SCROLL
        ======================================== */

        .indicacion-scroll {
            display: flex;
            align-items: center;
            gap: 14px;

            margin-top: 35px;

            color: var(--verde-principal);

            font-size: 0.9rem;
            font-weight: 600;
        }

        .flecha-scroll {
            font-size: 1.4rem;

            animation: bajar 1.8s ease-in-out infinite;
        }

        @keyframes bajar {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(7px);
            }

        }


        /* ========================================
           TÍTULOS DE SECCIONES
        ======================================== */

        .numero-seccion {
            margin-bottom: 10px;

            color: rgba(41, 57, 111, 0.10);

            font-size: 5rem;
            font-weight: 800;
            line-height: 1;
        }

        .numero-claro {
            color: rgba(255, 255, 255, 0.10);
        }

        .etiqueta {
            color: var(--verde-principal);

            font-size: 0.78rem;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .etiqueta-clara {
            color: var(--verde-lima);
        }

        .titulo-seccion {
            max-width: 750px;
            margin: 10px 0 0;

            color: var(--azul);

            font-size: clamp(2.3rem, 4vw, 4rem);
            line-height: 1.1;
            font-weight: 800;
        }

        .titulo-blanco {
            color: var(--blanco);
        }

        .texto-seccion {
            max-width: 720px;

            color: var(--gris);

            font-size: 1.2rem;
            line-height: 1.7;
        }

        .texto-claro {
            color: rgba(255, 255, 255, 0.82);
        }


        /* ========================================
           SECTORES
        ======================================== */

        .sectores-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 18px;
            margin-top: 35px;
        }

        .sector-card {
            padding: 30px 20px;

            text-align: center;

            background: var(--blanco);

            border: 1px solid #edf1ee;
            border-radius: 18px;

            box-shadow:
                0 10px 30px rgba(30, 60, 45, 0.08);

            transition:
                transform 0.35s ease,
                box-shadow 0.35s ease;
        }

        /* .sector-card:hover {
            transform: translateY(-7px);

            box-shadow:
                0 18px 40px rgba(30, 60, 45, 0.13);
        } */

        .sector-icono {
            width: 80px;
            height: 80px;
            object-fit: contain;
            display: block;
            margin: 0 auto 10px;
        }

        .sector-card h3 {
            margin: 0;

            color: var(--azul);

            font-size: 1rem;
        }

        .nota {
            margin-top: 28px;

            color: var(--verde-principal);

            font-weight: 700;
        }


        /* ========================================
           FORMACIÓN - TARJETAS VERDES
        ======================================== */

        .info-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 20px;
        }

        .info-card {
            padding: 30px;

            border:
                1px solid rgba(255, 255, 255, 0.14);

            border-radius: 18px;

            background:
                rgba(255, 255, 255, 0.08);
        }

        .info-icono {
            font-size: 2rem;
        }

        .info-card h3 {
            margin: 15px 0 8px;

            color: var(--verde-lima);
        }

        .info-card p {
            margin: 0;

            color: rgba(255, 255, 255, 0.82);

            line-height: 1.6;
        }

        .subtitulo-seccion {
            margin: 40px 0 20px;

            color: var(--blanco);

            font-size: 1.3rem;
        }

        .temas-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 12px;
        }

        .temas-grid div {
            padding: 18px;

            border:
                1px solid rgba(255, 255, 255, 0.08);

            border-radius: 12px;

            color: var(--blanco);

            background:
                rgba(255, 255, 255, 0.08);
        }


        /* ========================================
           HOJA 4 - INSCRIPCIONES
        ======================================== */

        .hoja-inscripcion .contenido-hoja {
            color: var(--blanco);
        }

        .hoja-inscripcion .titulo-seccion {
            color: var(--blanco);
        }

        .hoja-inscripcion .criterios-titulo {
            color: var(--verde-lima);
        }

        .fechas {
            display: flex;
            align-items: center;

            gap: 25px;

            margin: 35px 0;
        }

        .fecha-dia {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100px;
            height: 100px;

            flex-shrink: 0;

            border-radius: 20px;

            color: var(--blanco);

            background: var(--rojo);

            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.16);
        }

        .fecha-dia span {
            font-size: 2.5rem;
            font-weight: 800;
        }

        .fecha-texto strong {
            color: var(--blanco);

            font-size: 1.5rem;
        }

        .fecha-texto p {
            margin: 6px 0 0;

            color: rgba(255, 255, 255, 0.72);
        }

        .criterios-titulo {
            margin-bottom: 20px;

            color: var(--azul);
        }

        .criterios {
            max-width: 800px;

            padding: 0;

            list-style: none;
        }

        .criterios li {
            display: flex;
            align-items: flex-start;

            gap: 18px;

            padding: 17px 0;

            border-bottom:
                1px solid rgba(255, 255, 255, 0.15);

            color: rgba(255, 255, 255, 0.88);

            line-height: 1.6;
        }

        .criterios span {
            flex-shrink: 0;

            color: var(--verde-lima);

            font-weight: 800;
        }


        /* ========================================
           HOJA FINAL BLANCA
        ======================================== */

        .hoja-final {
            background: var(--blanco);
        }

        .contenido-final {
            max-width: 850px;
        }

        .linea-final {
            margin-top: 18px;
            margin-bottom: 32px;
        }

        .contenido-final h2 {
            max-width: 800px;

            margin: 0 0 24px;

            color: var(--azul);

            font-size: clamp(2.5rem, 4.5vw, 4.5rem);
            line-height: 1.12;
            font-weight: 800;
        }

        .contenido-final h2 span {
            display: block;

            color: var(--verde-principal);
        }

        .contenido-final p {
            max-width: 680px;

            margin: 0 0 38px;

            color: var(--gris);

            font-size: 1.1rem;
            line-height: 1.7;
        }


        /* ========================================
           BLOQUE DE REGISTRO
        ======================================== */

        .bloque-registro {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 30px;

            padding: 25px 28px;

            border:
                1px solid rgba(40, 97, 72, 0.15);

            border-radius: 18px;

            background: #f5f9f6;

            box-shadow:
                0 10px 30px rgba(30, 60, 45, 0.06);
        }

        .registro-info {
            display: flex;
            align-items: center;

            gap: 18px;
        }

        .registro-numero {
            color: var(--verde-principal);

            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
        }

        .registro-info strong {
            display: block;

            margin-bottom: 4px;

            color: var(--azul);
        }

        .registro-info small {
            color: var(--gris);
        }


        /* ========================================
           BOTÓN
        ======================================== */

        .btn-registro {
            display: inline-flex;
            align-items: center;

            gap: 20px;

            flex-shrink: 0;

            padding: 16px 25px;

            border-radius: 50px;

            color: var(--blanco);
            background: var(--verde-principal);

            text-decoration: none;

            font-weight: 800;

            transition:
                transform 0.4s ease,
                background 0.4s ease,
                box-shadow 0.4s ease;
        }

        .btn-registro:hover {
            transform: translateY(-3px);

            color: var(--blanco);

            background: var(--verde-oscuro);

            box-shadow:
                0 12px 30px rgba(30, 60, 45, 0.20);
        }

        .btn-registro span {
            font-size: 1.3rem;
        }


        /* ========================================
           MENSAJE FINAL
        ======================================== */

        .mensaje-final {
            display: flex;
            flex-wrap: wrap;

            gap: 10px;

            margin-top: 35px;

            color: #7b8781;

            font-size: 0.82rem;
        }

        .mensaje-final .punto {
            color: var(--rojo);
        }


        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 768px) {

            .contenido-hoja,
            .contenido-final {
                padding: 60px 25px;
            }
            .logo-contenedor {
                gap: 15px;
                margin-bottom: 25px;
            }

            .logo-gobernacion,
            .logo-uniempresarial {
                height: 70px;
                max-width: 45%;
            }

            .titulo-principal {
                font-size: clamp(2.8rem, 13vw, 4.5rem);
            }

            .sectores-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .temas-grid {
                grid-template-columns: 1fr;
            }

            .numero-seccion {
                font-size: 3.5rem;
            }

            .bloque-registro {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-registro {
                width: 100%;

                justify-content: space-between;
            }

            .fechas {
                align-items: flex-start;
            }

            .hoja-blanca::before,
            .hoja-verde::before {
                width: 240px;
                height: 240px;

                top: -120px;
                right: -100px;
            }

            .hoja-blanca::after,
            .hoja-verde::after {
                width: 190px;
                height: 190px;

                bottom: -110px;
                left: -90px;
            }

        }

        @media (max-width: 480px) {

            .sectores-grid {
                grid-template-columns: 1fr;
            }

            .fechas {
                gap: 18px;
            }

            .fecha-dia {
                width: 80px;
                height: 80px;
            }

            .fecha-dia span {
                font-size: 2rem;
            }

        }

    </style>
</head>

<body>


<main class="libro">


    <!-- ========================================
         HOJA 1 - PORTADA / BLANCA
    ======================================== -->

    <section class="hoja hoja-blanca portada">

        <div class="contenido-hoja">

            <div class="logo-contenedor">

                <img
                    src="assets/LogoGobernacion.png"
                    alt="Gobernación de Cundinamarca"
                    class="logo-gobernacion"
                >

                <img
                    src="assets/LogoUE.png"
                    alt="Uniempresarial - Fundación Universitaria Empresarial"
                    class="logo-uniempresarial"
                >

            </div>

            <h1 class="titulo-principal">
                Territorios que <span>Transforman</span>
            </h1>

            <h2 class="subtitulo">
                Formación Empresarial para la Circularidad
            </h2>

            <div class="linea-roja"></div>

            <p class="texto-principal">
                La Gobernación de Cundinamarca, a través de la Secretaría
                de Bienestar Verde, con el apoyo de Uniempresarial, invita
                a participar en este programa de formación diseñado para
                fortalecer las capacidades de empresas y actores de las
                cadenas de valor de los sectores de minería, turismo,
                curtiembre y lácteos.
            </p>

            <p class="texto-principal">
                Este proceso formativo brindará conocimientos y herramientas
                prácticas para implementar estrategias de economía circular,
                optimizar el uso de recursos, aprovechar y valorizar residuos,
                e impulsar modelos de negocio sostenibles.
            </p>

            <div class="indicacion-scroll">
                <span>Desliza para conocer más</span>
                <div class="flecha-scroll">↓</div>
            </div>

        </div>

    </section>


    <!-- ========================================
         HOJA 2 - PARTICIPANTES / VERDE
    ======================================== -->

    <section class="hoja hoja-verde">

        <div class="contenido-hoja">

            <div class="numero-seccion numero-claro">
                01
            </div>

            <span class="etiqueta etiqueta-clara">
                PARTICIPANTES
            </span>

            <h2 class="titulo-seccion titulo-blanco">
                ¿A quién está dirigido?
            </h2>

            <div class="linea-lima"></div>

            <p class="texto-seccion texto-claro">
                El programa está dirigido a empresarios y actores de las
                cadenas de valor de los sectores priorizados.
            </p>

            <div class="sectores-grid">

                <div class="sector-card">
                    <img
                        src="assets/iconos/minero.png"
                        alt="Sector Minero"
                        class="sector-icono" 
                    >
                    <h3>Minero</h3>
                </div>

                <div class="sector-card">
                    <img
                        src="assets/iconos/turistico.png"
                        alt="Sector Turístico"
                        class="sector-icono"
                    >
                    <h3>Turístico</h3>
                </div>

                <div class="sector-card">
                    <img
                        src="assets/iconos/curtiembre.png"
                        alt="Sector Curtiembre"
                        class="sector-icono"
                    >
                    <h3>Curtiembre</h3>
                </div>

                <div class="sector-card">
                    <img
                        src="assets/iconos/lacteo.png"
                        alt="Sector Lácteo"
                        class="sector-icono"
                    >
                    <h3>Lácteo</h3>
                </div>

            </div>

            <p class="nota" style="color: var(--verde-lima);">
                Se dispondrán 40 cupos, con 10 participantes por cada
                nodo sectorial.
            </p>

        </div>

    </section>


    <!-- ========================================
         HOJA 3 - FORMACIÓN / BLANCA
    ======================================== -->

    <section class="hoja hoja-blanca">

        <div class="contenido-hoja">

            <div class="numero-seccion">
                02
            </div>

            <span class="etiqueta">
                PROCESO FORMATIVO
            </span>

            <h2 class="titulo-seccion">
                Una formación para transformar
            </h2>

            <div class="linea-verde"></div>

            <div class="info-grid">

                <div class="info-card"
                     style="
                        background: #f5f9f6;
                        border-color: rgba(40, 97, 72, 0.12);
                     "
                >
                    <span class="info-icono">💻</span>

                    <h3 style="color: var(--verde-principal);">
                        Modalidad
                    </h3>

                    <p style="color: var(--gris);">
                        Virtual sincrónica a través de Microsoft Teams.
                    </p>
                </div>

                <div class="info-card"
                     style="
                        background: #f5f9f6;
                        border-color: rgba(40, 97, 72, 0.12);
                     "
                >
                    <span class="info-icono">📅</span>

                    <h3 style="color: var(--verde-principal);">
                        Duración
                    </h3>

                    <p style="color: var(--gris);">
                        Del 15 de septiembre al 8 de octubre de 2026.
                    </p>
                </div>

            </div>

            <h3
                class="subtitulo-seccion"
                style="color: var(--azul);"
            >
                Temas principales
            </h3>

            <div class="temas-grid">

                <div
                    style="
                        color: var(--texto);
                        background: #f5f9f6;
                        border: 1px solid #e4ece6;
                    "
                >
                    Fundamentos y principios de economía circular y sostenibilidad.
                </div>

                <div
                    style="
                        color: var(--texto);
                        background: #f5f9f6;
                        border: 1px solid #e4ece6;
                    "
                >
                    Uso eficiente de recursos (agua, energía y materiales).
                </div>

                <div
                    style="
                        color: var(--texto);
                        background: #f5f9f6;
                        border: 1px solid #e4ece6;
                    "
                >
                    Producción sostenible y competitividad empresarial.
                </div>

                <div
                    style="
                        color: var(--texto);
                        background: #f5f9f6;
                        border: 1px solid #e4ece6;
                    "
                >
                    Herramientas para el análisis y mejora de procesos.
                </div>

                <div
                    style="
                        color: var(--texto);
                        background: #f5f9f6;
                        border: 1px solid #e4ece6;
                    "
                >
                    Modelos de negocio sostenibles e innovación.
                </div>

                <div
                    style="
                        color: var(--texto);
                        background: #f5f9f6;
                        border: 1px solid #e4ece6;
                    "
                >
                    Estrategias de aprovechamiento, valorización y gestión de residuos.
                </div>

                <div
                    style="
                        color: var(--texto);
                        background: #f5f9f6;
                        border: 1px solid #e4ece6;
                    "
                >
                    Casos prácticos y experiencias aplicadas por sector.
                </div>

                <div
                    style="
                        color: var(--texto);
                        background: #f5f9f6;
                        border: 1px solid #e4ece6;
                    "
                >
                    Herramientas de análisis de sostenibilidad e indicadores ambientales.
                </div>

            </div>

        </div>

    </section>


    <!-- ========================================
         HOJA 4 - INSCRIPCIÓN / VERDE
    ======================================== -->

    <section class="hoja hoja-verde hoja-inscripcion">

        <div class="contenido-hoja">

            <div class="numero-seccion numero-claro">
                03
            </div>

            <span class="etiqueta etiqueta-clara">
                POSTULACIÓN
            </span>

            <h2 class="titulo-seccion titulo-blanco">
                Inscripciones y selección
            </h2>

            <div class="linea-lima"></div>

            <div class="fechas">

                <div class="fecha-dia">
                    <span>7</span>
                </div>

                <div class="fecha-texto">
                    <strong> 8 y 9 de septiembre</strong>

                    <p>
                        Inscripciones abiertas en 2026
                    </p>
                </div>

            </div>

            <h3 class="criterios-titulo">
                Criterios de selección
            </h3>

            <ul class="criterios">

                <li>
                    <span>01</span>
                    Orden de llegada de la inscripción.
                </li>

                <li>
                    <span>02</span>
                    Distribución equitativa entre municipios y sectores.
                </li>

                <li>
                    <span>03</span>
                    Disponibilidad de cupos.
                </li>

                <li>
                    <span>04</span>
                    Convocatoria exclusiva para empresas que han trabajado
                    previamente con la Secretaría de Bienestar Verde.
                </li>

            </ul>

        </div>

    </section>


    <!-- ========================================
         HOJA 5 - INICIAR POSTULACIÓN / BLANCA
    ======================================== -->

    <section class="hoja hoja-blanca hoja-final">

        <div class="contenido-final">

            <span class="etiqueta">
                INSCRIPCIONES
            </span>

            <div class="linea-verde linea-final"></div>

            <h2>
                Da el siguiente paso hacia una
                <span>empresa más sostenible.</span>
            </h2>

            <p>
                Completa el formulario de inscripción y participa en este proceso
                de formación para fortalecer tus capacidades y avanzar hacia modelos
                empresariales más sostenibles y circulares.
            </p>

            <div class="bloque-registro">

                <div class="registro-info">

                    <span class="registro-numero">
                        40
                    </span>

                    <div>
                        <strong>Cupos disponibles</strong>

                        <small>
                            Distribuidos entre los sectores priorizados
                        </small>
                    </div>

                </div>

                <a
                    href="formulario.php"
                    class="btn-registro"
                >
                    Iniciar mi postulación
                    <span>→</span>
                </a>

            </div>

            <div class="mensaje-final">
                <span>Territorios que Transforman</span>
                <span class="punto">•</span>
                <span>Formación Empresarial para la Circularidad</span>
            </div>

        </div>

    </section>


</main>


<script>

    const hojas = document.querySelectorAll(".hoja");

    const observador = new IntersectionObserver(
        (entradas) => {

            entradas.forEach((entrada) => {

                if (entrada.isIntersecting) {

                    entrada.target.classList.add("visible");

                }

            });

        },
        {
            threshold: 0.25
        }
    );


    hojas.forEach((hoja) => {

        observador.observe(hoja);

    });

</script>


</body>
</html>