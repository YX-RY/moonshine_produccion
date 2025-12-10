<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1d1f21, #3a3f44);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(8px);
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 600;
            background: linear-gradient(45deg, #4CAF50, #8BC34A);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p {
            font-size: 1.1rem;
            margin-bottom: 30px;
            color: #b0b0b0;
        }

        .btn-admin {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 15px 30px;
            background: linear-gradient(45deg, #4CAF50, #43a047);
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            font-weight: 600;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-admin:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(76, 175, 80, 0.4);
            background: linear-gradient(45deg, #43a047, #388e3c);
        }

        .btn-admin:active {
            transform: translateY(-1px);
        }

        .btn-admin::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .btn-admin:hover::before {
            left: 100%;
        }

        .admin-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .btn-admin:hover .admin-icon {
            transform: translateX(5px);
        }

        .url-info {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #888;
            background: rgba(0,0,0,0.2);
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
        }

        .success-badge {
            display: inline-block;
            background: rgba(76, 175, 80, 0.2);
            color: #4CAF50;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-top: 10px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>

</head>
<body>

    <div class="container">
        <h1>🚀 Bienvenido a la Página Principal</h1>
        <p>Accede al panel de administración desde aquí:</p>
        
        <!-- BOTÓN CORREGIDO - FUNCIONA EN LOCAL Y PRODUCCIÓN -->
        <a href="{{ url('/moonshine/login') }}" class="btn-admin">
            <span class="admin-icon">⚡</span>
            Ir al Panel de Administración
        </a>

        <!-- INFO DE DEBUG (solo en desarrollo) -->
        @if(app()->environment('local'))
            <div class="url-info">
                🔍 URL generada: <code>{{ url('/moonshine/login') }}</code>
            </div>
        @else
            <div class="success-badge">
                ✅ Listo para producción
            </div>
        @endif

        <!-- ENLACE ALTERNATIVO (si Moonshine está en /admin) -->
        <!--
        <div style="margin-top: 20px;">
            <a href="{{ url('/admin') }}" style="color: #4CAF50; text-decoration: none;">
                Alternativa: Acceder a /admin
            </a>
        </div>
        -->
    </div>

</body>
</html>
