<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Formulario de inscripción | Uniempresarial</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        :root {
            --verde-principal: #1d6b4f;
            --verde-oscuro: #134836;
            --verde-claro: #eaf4ee;

            --rojo-institucional: #ed0033;
            --azul-institucional: #29396f;

            --texto: #263238;
            --gris: #6c757d;
            --fondo: #f4f7f5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background:
                linear-gradient(
                    135deg,
                    #f3f7f4 0%,
                    #e8f1eb 100%
                );
            color: var(--texto);
        }


        /* ========================================
           CONTENEDOR PRINCIPAL
        ======================================== */

        .form-container {
            max-width: 980px;
            margin: 45px auto;
            padding: 0 15px;
        }

        .form-card {
            border: none;
            border-radius: 22px;
            overflow: hidden;
            background: white;
            box-shadow: 0 15px 45px rgba(20, 60, 45, 0.12);
        }


        /* ========================================
           ENCABEZADO
        ======================================== */

        .form-header {
            position: relative;
            padding: 35px 45px 30px;
            background: linear-gradient(
                135deg,
                var(--azul-institucional),
                var(--azul-institucional)
            );
            color: white;
            overflow: hidden;
        }

        .form-header::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            top: -170px;
            right: -80px;
            background: rgba(255, 255, 255, 0.06);
        }

        .form-header::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            bottom: -120px;
            left: -60px;
            background: var(--gris);
            opacity: 0.15;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .logo-texto {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            padding-bottom: 10px;
        }

        .logo-texto strong {
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .logo-texto span {
            font-size: 0.85rem;
            opacity: 0.85;
        }

        .form-header h1 {
            margin: 0 0 8px;
            font-size: 2rem;
            font-weight: 800;
        }

        .form-header p {
            margin: 0;
            max-width: 700px;
            color: rgba(255, 255, 255, 0.85);
        }


        /* ========================================
           CONTENIDO
        ======================================== */

        .form-body {
            padding: 40px 45px 45px;
        }


        /* ========================================
           INFORMACIÓN DEL PASO
        ======================================== */

        .step-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 18px;
        }

        .step-label {
            color: var(--verde-principal);
            font-size: 0.82rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .step-number {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 105px;
            padding: 8px 15px;
            border-radius: 50px;
            background: var(--verde-claro);
            color: var(--verde-principal);
            font-size: 0.85rem;
            font-weight: 700;
        }


        /* ========================================
           BARRA DE PROGRESO
        ======================================== */

        .progress-container {
            margin-bottom: 38px;
        }

        .progress {
            height: 10px;
            overflow: hidden;
            border-radius: 20px;
            background: #e6e9e7;
        }

        .progress-bar {
            background: linear-gradient(
                90deg,
                var(--verde-principal),
                #74a847
            );
            border-radius: 20px;
            transition: width 0.35s ease;
        }


        /* ========================================
           PASOS
        ======================================== */

        .step {
            display: none;
            animation: aparecer 0.3s ease;
        }

        .step.active {
            display: block;
        }

        @keyframes aparecer {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .step-title {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 10px;
            color: var(--azul-institucional);
            font-size: 1.45rem;
            font-weight: 800;
        }

        .step-title-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            flex-shrink: 0;
            border-radius: 14px;
            background: var(--verde-claro);
            font-size: 1.25rem;
        }

        .step-description {
            margin-bottom: 30px;
            color: var(--gris);
        }


        /* ========================================
           CAMPOS
        ======================================== */

        .form-label {
            margin-bottom: 8px;
            color: var(--texto);
            font-size: 0.93rem;
            font-weight: 700;
        }

        .form-control,
        .form-select {
            min-height: 48px;
            padding: 11px 14px;
            border: 1px solid #d7dfda;
            border-radius: 11px;
            background-color: #fff;
            color: var(--texto);
            transition: all 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--verde-principal);
            box-shadow: 0 0 0 0.2rem rgba(29, 107, 79, 0.12);
        }

        .form-control::placeholder {
            color: #a0a7a3;
        }


        /* ========================================
           TARJETAS DE VALIDACIÓN
        ======================================== */

        .validation-card {
            margin-bottom: 25px;
            padding: 25px;
            border: 1px solid #dfe8e2;
            border-radius: 16px;
            background: #fbfdfb;
        }

        .validation-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 15px;
        }

        .validation-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--verde-claro);
            font-size: 1.2rem;
        }

        .validation-card h5 {
            margin: 0;
            color: var(--azul-institucional);
            font-weight: 800;
        }

        .validation-card p {
            color: #5c6761;
            line-height: 1.7;
        }

        .form-check {
            margin-top: 18px;
            padding: 14px 15px 14px 42px;
            border-radius: 10px;
            background: white;
            border: 1px solid #e1e6e3;
        }

        .form-check-input {
            margin-top: 0.2rem;
        }

        .form-check-input:checked {
            background-color: var(--verde-principal);
            border-color: var(--verde-principal);
        }

        .form-check-label {
            color: var(--texto);
            font-weight: 700;
        }


        /* ========================================
           DOCUMENTOS
        ======================================== */

        .documents-title {
            margin: 35px 0 20px;
            color: var(--azul-institucional);
            font-weight: 800;
        }

        .document-box {
            margin-bottom: 20px;
            padding: 22px;
            border: 2px dashed #c8d8cf;
            border-radius: 15px;
            background: #f8fbf9;
            transition: all 0.2s ease;
        }

        .document-box:hover {
            border-color: var(--verde-principal);
            background: var(--verde-claro);
        }

        .document-box .form-control {
            background: white;
        }

        .form-text {
            margin-top: 8px;
            color: var(--verde-principal);
            font-size: 0.82rem;
        }


        /* ========================================
           BOTONES
        ======================================== */

        .form-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 35px;
            padding-top: 25px;
            border-top: 1px solid #e6ebe8;
        }

        .btn-navigation {
            min-width: 130px;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 700;
        }

        .btn-anterior {
            color: var(--azul-institucional);
            background: white;
            border: 1px solid var(--azul-institucional);
        }

        .btn-anterior:hover {
            color: white;
            background: var(--azul-institucional);
        }

        .btn-siguiente {
            color: white;
            background: var(--verde-principal);
            border: 1px solid var(--verde-principal);
        }

        .btn-siguiente:hover {
            color: white;
            background: var(--verde-oscuro);
            border-color: var(--verde-oscuro);
        }

        .btn-enviar {
            color: white;
            background: var(--rojo-institucional);
            border: 1px solid var(--rojo-institucional);
        }

        .btn-enviar:hover {
            color: white;
            background: #c9002b;
            border-color: #c9002b;
        }


        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 768px) {

            .form-container {
                margin: 20px auto;
            }

            .form-header {
                padding: 28px 25px;
            }

            .form-header h1 {
                font-size: 1.6rem;
            }

            .form-body {
                padding: 30px 22px;
            }

            .step-info {
                align-items: flex-start;
                flex-direction: column;
            }

            .step-number {
                min-width: auto;
            }

            .step-title {
                align-items: flex-start;
                font-size: 1.2rem;
            }

            .form-navigation {
                flex-wrap: wrap;
            }

            .btn-navigation {
                flex: 1;
                min-width: 120px;
            }
        }

    </style>

</head>

<body>

<div class="container form-container">

    <div class="form-card">


        <!-- ENCABEZADO -->

        <div class="form-header">

            <div class="header-content">

                <div class="logo-texto">
                    <strong>Uniempresarial</strong>
                    <span>Fundación Universitaria Empresarial</span>
                </div>

                <h1>Formulario de inscripción</h1>

                <p>
                    Territorios que Transforman: Formación Empresarial
                    para la Circularidad
                </p>

            </div>

        </div>


        <!-- CUERPO DEL FORMULARIO -->

        <div class="form-body">


            <!-- INFORMACIÓN DEL PASO -->

            <div class="step-info">

                <div>
                    <div class="step-label">
                        Registro de postulación
                    </div>
                </div>

                <div class="step-number" id="stepNumber">
                    Paso 1 de 3
                </div>

            </div>


            <!-- PROGRESO -->

            <div class="progress-container">

                <div class="progress">
                    <div
                        id="progressBar"
                        class="progress-bar"
                        style="width: 33.33%"
                    ></div>
                </div>

            </div>


            <form
                action="procesar.php"
                method="POST"
                enctype="multipart/form-data"
                id="formulario"
            >


                <!-- =====================================
                     PASO 1
                ====================================== -->

                <div class="step active">

                    <h4 class="step-title">
                        <span class="step-title-icon">👤</span>
                        Datos de la persona que tomará la formación
                    </h4>

                    <p class="step-description">
                        Complete la información de la persona que participará
                        en el proceso de formación.
                    </p>


                    <div class="mb-3">

                        <label class="form-label">
                            Nombres y apellidos
                        </label>

                        <input
                            type="text"
                            name="nombres"
                            class="form-control"
                            placeholder="Ingrese nombres y apellidos completos"
                            required
                        >

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Número de documento de identidad
                                </label>

                                <input
                                    type="text"
                                    name="documento_participante"
                                    class="form-control"
                                    placeholder="Ingrese el número de documento"
                                    required
                                >

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Número de teléfono
                                </label>

                                <input
                                    type="tel"
                                    name="telefono_participante"
                                    class="form-control"
                                    placeholder="Ejemplo: 3001234567"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-7">

                            <div class="mb-3">

                                <label class="form-label">
                                    Correo electrónico
                                </label>

                                <input
                                    type="email"
                                    name="correo"
                                    class="form-control"
                                    placeholder="ejemplo@correo.com"
                                    required
                                >

                            </div>

                        </div>


                        <div class="col-md-5">

                            <div class="mb-3">

                                <label class="form-label">
                                    Cargo que desempeña
                                </label>

                                <input
                                    type="text"
                                    name="cargo"
                                    class="form-control"
                                    placeholder="Ejemplo: Gerente"
                                    required
                                >

                            </div>

                        </div>

                    </div>

                </div>


                <!-- =====================================
                     PASO 2
                ====================================== -->

                <div class="step">

                    <h4 class="step-title">
                        <span class="step-title-icon">🏢</span>
                        Identificación de la empresa
                    </h4>

                    <p class="step-description">
                        Registre la información correspondiente a la empresa.
                    </p>


                    <div class="mb-3">

                        <label class="form-label">
                            Nombre o razón social
                        </label>

                        <input
                            type="text"
                            name="razon_social"
                            class="form-control"
                            required
                        >

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    NIT con dígito de verificación
                                </label>

                                <input
                                    type="text"
                                    name="nit"
                                    class="form-control"
                                    placeholder="Ejemplo: 900123456-7"
                                    required
                                >

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Teléfono de contacto
                                </label>

                                <input
                                    type="tel"
                                    name="telefono_empresa"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Nombre del representante legal
                                </label>

                                <input
                                    type="text"
                                    name="representante_legal"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Documento del representante legal
                                </label>

                                <input
                                    type="text"
                                    name="documento_representante"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Ciudad o municipio
                                </label>

                                <input
                                    type="text"
                                    name="municipio"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Dirección
                                </label>

                                <input
                                    type="text"
                                    name="direccion"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Nodo al que pertenece la empresa
                                </label>

                                <select
                                    name="nodo"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        Seleccione una opción
                                    </option>

                                    <option value="Minero">Minero</option>
                                    <option value="Lácteo">Lácteo</option>
                                    <option value="Turístico">Turístico</option>
                                    <option value="Curtiembre">Curtiembre</option>

                                </select>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="mb-3">

                                <label class="form-label">
                                    Tamaño de la empresa
                                </label>

                                <select
                                    name="tamano_empresa"
                                    class="form-select"
                                    required
                                >

                                    <option value="">
                                        Seleccione una opción
                                    </option>

                                    <option value="Microempresa">
                                        Microempresa
                                    </option>

                                    <option value="Pequeña empresa">
                                        Pequeña empresa
                                    </option>

                                    <option value="Mediana empresa">
                                        Mediana empresa
                                    </option>

                                    <option value="Gran empresa">
                                        Gran empresa
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Número de empleados
                        </label>

                        <input
                            type="number"
                            name="numero_empleados"
                            class="form-control"
                            min="1"
                            required
                        >

                    </div>

                </div>


                <!-- =====================================
                     PASO 3
                ====================================== -->

                <div class="step">

                    <h4 class="step-title">
                        <span class="step-title-icon">✓</span>
                        Validaciones y documentos
                    </h4>

                    <p class="step-description">
                        Lea y acepte las condiciones requeridas y adjunte
                        los documentos de soporte.
                    </p>


                    <!-- DATOS PERSONALES -->

                    <div class="validation-card">

                        <div class="validation-card-header">

                            <div class="validation-icon">🔒</div>

                            <h5>Tratamiento de datos personales</h5>

                        </div>

                        <p>
                            Acepto el tratamiento de mis datos personales
                            conforme a la Política de Protección de Datos
                            Personales de Uniempresarial.
                        </p>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="acepta_datos"
                                value="1"
                                required
                            >

                            <label class="form-check-label">
                                Sí, acepto el tratamiento de mis datos personales.
                            </label>

                        </div>

                    </div>


                    <!-- COMPROMISO -->

                    <div class="validation-card">

                        <div class="validation-card-header">

                            <div class="validation-icon">🤝</div>

                            <h5>Compromiso del participante</h5>

                        </div>

                        <p>
                            En mi calidad de participante de esta formación,
                            manifiesto formalmente mi compromiso de asistir
                            puntualmente y de manera personal a todas las
                            sesiones programadas, desarrollar y aprobar las
                            actividades de evaluación, participar activa y
                            responsablemente en el proceso formativo, culminar
                            satisfactoriamente la formación, replicar los
                            conocimientos adquiridos al interior de mi empresa
                            y aplicar los aprendizajes obtenidos.
                        </p>

                        <p>
                            Acepto que el incumplimiento de este compromiso
                            inhabilitará a la empresa para participar en futuros
                            programas, proyectos y acciones desarrollados por
                            la Secretaría de Bienestar Verde de la Gobernación
                            de Cundinamarca.
                        </p>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="acepta_compromiso"
                                value="1"
                                required
                            >

                            <label class="form-check-label">
                                He leído y acepto el compromiso de participación.
                            </label>

                        </div>

                    </div>


                    <!-- DOCUMENTOS -->

                    <h5 class="documents-title">
                        📄 Documentos de soporte
                    </h5>


                    <div class="document-box">

                        <label class="form-label">
                            Certificado de Matrícula Mercantil
                        </label>

                        <p class="text-muted small">
                            El documento no debe tener una antigüedad superior
                            a 60 días.
                        </p>

                        <input
                            type="file"
                            name="certificado_matricula"
                            class="form-control"
                            accept=".pdf,application/pdf"
                            required
                        >

                        <div class="form-text">
                            ✓ Formato permitido: PDF
                        </div>

                    </div>


                    <div class="document-box">

                        <label class="form-label">
                            Cédula de ciudadanía de la persona que asistirá
                            a la formación
                        </label>

                        <input
                            type="file"
                            name="cedula_participante"
                            class="form-control"
                            accept=".pdf,application/pdf"
                            required
                        >

                        <div class="form-text">
                            ✓ Formato permitido: PDF
                        </div>

                    </div>

                </div>


                <!-- =====================================
                     BOTONES
                ====================================== -->

                <div class="form-navigation">

                    <button
                        type="button"
                        class="btn btn-navigation btn-anterior"
                        id="prevBtn"
                        onclick="nextPrev(-1)"
                        style="display:none"
                    >
                        ← Anterior
                    </button>


                    <button
                        type="button"
                        class="btn btn-navigation btn-siguiente ms-auto"
                        id="nextBtn"
                        onclick="nextPrev(1)"
                    >
                        Siguiente →
                    </button>


                    <button
                        type="submit"
                        class="btn btn-navigation btn-enviar ms-auto"
                        id="submitBtn"
                        style="display:none"
                    >
                        Enviar inscripción ✓
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

let currentStep = 0;

const steps = document.querySelectorAll(".step");

const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const submitBtn = document.getElementById("submitBtn");

const progressBar = document.getElementById("progressBar");
const stepNumber = document.getElementById("stepNumber");


function showStep(n) {

    steps.forEach((step, index) => {

        step.classList.remove("active");

        if (index === n) {
            step.classList.add("active");
        }

    });


    prevBtn.style.display =
        n === 0 ? "none" : "block";


    nextBtn.style.display =
        n === steps.length - 1 ? "none" : "block";


    submitBtn.style.display =
        n === steps.length - 1 ? "block" : "none";


    const progress =
        ((n + 1) / steps.length) * 100;


    progressBar.style.width =
        progress + "%";


    stepNumber.textContent =
        "Paso " + (n + 1) + " de " + steps.length;


    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

}


function validarPaso() {

    const inputs =
        steps[currentStep].querySelectorAll(
            "input, select"
        );


    for (const input of inputs) {

        if (!input.checkValidity()) {

            input.reportValidity();

            return false;
        }

    }

    return true;

}


function nextPrev(n) {

    if (n === 1 && !validarPaso()) {
        return;
    }


    currentStep += n;


    showStep(currentStep);

}


showStep(currentStep);

</script>

</body>
</html>