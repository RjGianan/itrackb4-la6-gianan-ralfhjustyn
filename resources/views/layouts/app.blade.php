<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | My Movie List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --archive-ink: #232a31;
            --archive-blue: #0d6efd;
            --archive-line: #d7dce1;
            --archive-muted: #68737d;
        }

        body {
            color: var(--archive-ink);
            background: #f4f6f8 !important;
        }

        .archive-main {
            max-width: 1120px;
        }

        .archive-main {
            padding-bottom: 3rem;
        }

        .archive-card {
            background: #fff;
            border: 1px solid var(--archive-line);
            border-radius: .4rem;
            box-shadow: 0 1px 3px rgb(0 0 0 / 5%);
        }

        .archive-eyebrow {
            color: var(--archive-blue);
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .archive-subtitle,
        .archive-byline {
            color: var(--archive-muted);
        }

        .filter-summary {
            background: #d1f2fa;
            border: 1px solid #b6e8f3;
            border-radius: .3rem;
            color: #15566a;
        }

        .filter-chip {
            border: 1px solid var(--archive-blue);
            color: var(--archive-blue);
            font-size: .875rem;
        }

        .filter-chip:hover,
        .filter-chip.active {
            background: var(--archive-blue);
            color: #fff;
        }

        .archive-table thead th {
            background: var(--archive-ink);
            color: #fff;
            white-space: nowrap;
        }

        .archive-table a {
            color: var(--archive-blue);
        }

        .archive-label {
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-light">
    <header class="mb-3">
        @include('partials._nav')
        <div class="container">
            <p class="archive-byline small mb-0">Prepared by: Ralfh Justyn V. Gianan</p>
        </div>
    </header>

    <main class="container archive-main">
        @if (session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>