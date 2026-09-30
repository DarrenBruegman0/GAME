<?php
/**
 * Campus Makerspace Workshop Registration
 *
 * Complete the PHP in Steps 1-10 of the lab instructions.
 * Each STEP comment below matches a dropdown in the Canvas lab.
 *
 * PHP build map:
 * STEP 1: Initialize variables and create the POST block.
 * STEP 2: Retrieve and normalize values inside the POST block.
 * STEP 3: Validate the name and email inside the POST block.
 * STEP 4: Display the error summary above the form.
 * STEP 5: Validate the student ID inside the POST block.
 * STEP 6: Validate the workshop inside the POST block.
 * STEP 7: Validate the number of seats inside the POST block.
 * STEP 8: Apply the 3D-printing rule inside the POST block.
 * STEP 9: Validate the safety agreement inside the POST block.
 * STEP 10: Record success, then update the supplied HTML fields.
 */

/*** STEP 1: Initialize the page and recognize a POST request. ***/

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Makerspace Workshop Registration</title>
    <?php require __DIR__ . '/includes/bootstrapcdnlinks.php'; ?>
    <style>
        .hero {
            background: linear-gradient(120deg, #212529, #4b236d);
        }

        .workshop-card {
            border-left: 5px solid #6f42c1;
        }
    </style>
</head>
<body class="bg-body-tertiary">
    <?php require __DIR__ . '/includes/navigation.php'; ?>

    <header class="hero text-white py-5">
        <div class="container">
            <p class="text-uppercase fw-semibold mb-2">Learn · Make · Create</p>
            <h1 class="display-5 fw-bold">Makerspace Workshops</h1>
            <p class="lead mb-0">
                Reserve a place in an upcoming hands-on campus workshop.
            </p>
        </div>
    </header>

    <main class="container py-5">
        <div class="row g-4">
            <aside class="col-lg-4">
                <div class="card workshop-card shadow-sm">
                    <div class="card-body">
                        <h2 class="h4">Available workshops</h2>
                        <dl class="mb-0">
                            <dt>3D Printing</dt>
                            <dd>Introduction to preparing and printing a model.</dd>

                            <dt>Laser Cutting</dt>
                            <dd>Create a small project from a vector design.</dd>

                            <dt>Vinyl Design</dt>
                            <dd>Design, cut, and apply a custom vinyl graphic.</dd>
                        </dl>
                    </div>
                </div>

                <div class="alert alert-info mt-3 mb-0">
                    <strong>Reservation policy:</strong>
                    Registrations may request 1–3 seats. A 3D-printing
                    registration is limited to one seat.
                </div>
            </aside>

            <section class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h3">Register for a workshop</h2>
                        <p class="text-body-secondary">
                            Complete every field before submitting the form.
                        </p>

                        <!-- STEP 4: Display the error summary here. -->

                        <!-- STEP 10: Display the success message here. -->

                        <form method="post" action="registration.php" novalidate>
                            <div class="mb-3">
                                <label class="form-label" for="full_name">Full name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="full_name"
                                    name="full_name"
                                    placeholder="Jordan Rivera">
                                <!-- STEP 10: Make this field sticky and show its error. -->
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">College email</label>
                                <input
                                    class="form-control"
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="student@example.edu">
                                <!-- STEP 10: Make this field sticky and show its error. -->
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="student_id">Student ID</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="student_id"
                                    name="student_id"
                                    placeholder="STU-123456">
                                <div class="form-text">
                                    Use STU- followed by exactly six digits.
                                </div>
                                <!-- STEP 10: Make this field sticky and show its error. -->
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="workshop">Workshop</label>
                                <select class="form-select" id="workshop" name="workshop">
                                    <option value="">Choose a workshop</option>
                                    <option value="3d-printing">3D Printing</option>
                                    <option value="laser-cutting">Laser Cutting</option>
                                    <option value="vinyl-design">Vinyl Design</option>
                                </select>
                                <!-- STEP 10: Make this field sticky and show its error. -->
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="seats">Number of seats</label>
                                <input
                                    class="form-control"
                                    type="number"
                                    id="seats"
                                    name="seats"
                                    min="1"
                                    max="3"
                                    placeholder="1">
                                <!-- STEP 10: Make this field sticky and show its error. -->
                            </div>

                            <div class="form-check mb-4">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value="yes"
                                    id="agreement"
                                    name="agreement">
                                <label class="form-check-label" for="agreement">
                                    I agree to follow the makerspace safety rules.
                                </label>
                                <!-- STEP 10: Make this field sticky and show its error. -->
                            </div>

                            <button class="btn btn-primary btn-lg" type="submit">
                                Reserve workshop seats
                            </button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
