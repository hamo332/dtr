<!DOCTYPE html>
<html>
<head>
    <title>تقرير سجلات المستخدم</title>
    <style>
        /* تنسيقات CSS هنا */
        .company-logo {
            text-align: center;
        }
        .company-name {
            font-size: 18px;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="company-logo">
        <img src="{{ public_path('images/logo.png') }}" alt="لوجو الشركة" width="100">
        <p class="company-name">شركة المثال</p>
    </div>
    <h2>تقرير سجلات المستخدم</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>اسم المستخدم</th>
                <th>وقت الدخول</th>
                <th>وقت الخروج</th>
                <th>الوقت الكلي</th>
                <th>ساعات العمل</th>
                <th>ساعات عادية</th>
                <th>ساعات إضافية</th>
                <th>سعر ساعات عادية</th>
                <th>سعر ساعات إضافية</th>
                <th>السعر الإجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userLogs as $index => $log)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $log->time_in }}</td>
                    <td>{{ $log->time_out }}</td>
                    <!-- حساب الوقت الكلي والوقت الإضافي -->
                    <!-- تنسيق الباقي من البيانات -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
