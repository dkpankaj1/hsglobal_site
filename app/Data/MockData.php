<?php

namespace App\Data;

/**
 * MockData — centralised placeholder data for all website sections.
 *
 * TODO: When the admin panel is ready, replace each static method with the
 *       equivalent Eloquent query (e.g. return School::first();).
 */
class MockData
{
    // ──────────────────────────────────────────────────────────────
    // ABOUT
    // ──────────────────────────────────────────────────────────────

    public static function aboutSchool(): array
    {
        return [
            'name' => 'H.S. Global Academy',
            'established' => '2019',
            'affiliation' => 'Central Board of Secondary Education (CBSE)',
            'aff_no' => 'Applied',
            'school_no' => 'Applied',
            'address' => 'Bhaishahi Bazar, Hata, Kushinagar, Uttar Pradesh – 274204',
            'email' => 'contact@hsglobalacademy.in',
            'phone' => '+91 89605 53332 / +91 94510 27766',
            'description' => 'Welcome to HS Global Academy, the best school in Kushinagar, where education meets excellence. We are dedicated to providing high-quality learning experiences, modern infrastructure, and a nurturing environment that helps students achieve their full potential. Our school is known for its consistent academic success, innovative teaching methodologies, and highly qualified faculty who are committed to shaping future leaders.',
            'long_description' => 'At HS Global Academy, we focus on both academic and extracurricular development, ensuring that students receive a well-rounded education. Our campus features state-of-the-art Biology, Physics, Chemistry, and Computer Labs, allowing students to gain hands-on experience and practical knowledge. We also have a well-stocked library that fosters a love for reading and research, along with a big playground that encourages physical fitness, sports, and teamwork. Beyond academics, we emphasize character building, discipline, and personality development, preparing students not just for exams but for life. Our safe and structured learning environment ensures that every child receives the attention and guidance they need to excel. With better performance in the area and a track record of excellence, HS Global Academy is the ideal choice for parents looking for the best education in Kushinagar. Join us today and give your child a brighter future with world-class education, modern facilities, and endless opportunities for growth.',
            'gallery' => [
                ['src' => asset('assets/web/images/about-us/gallery-1.jpg'), 'alt' => 'School Campus', 'caption' => 'Our Sprawling Campus'],
                ['src' => asset('assets/web/images/about-us/gallery-2.jpg'), 'alt' => 'Smart Classrooms', 'caption' => 'Smart Classrooms'],
                ['src' => asset('assets/web/images/about-us/gallery-3.jpg'), 'alt' => 'Science Laboratory', 'caption' => 'Science Laboratories'],
                ['src' => asset('assets/web/images/about-us/gallery-4.jpg'), 'alt' => 'Sports Facilities', 'caption' => 'Sports & Recreation'],
                ['src' => asset('assets/web/images/about-us/gallery-5.jpg'), 'alt' => 'Cultural Events', 'caption' => 'Cultural Events'],
            ],
            'highlights' => [
                'Best School in Kushinagar',
                'State-of-the-art Science & Computer Labs',
                'Well-stocked Library & Big Playground',
                'CCTV-secured Safe Campus',
                'Experienced & Qualified Faculty',
                'Holistic Academic & Co-curricular Development',
            ],
            'achievements' => [
                [
                    'icon' => 'fa-trophy',
                    'title' => 'Best School in Kushinagar',
                    'desc' => 'Recognised as the best school in Kushinagar for consistent academic excellence and holistic student development.',
                    'year' => '2025',
                ],
                [
                    'icon' => 'fa-graduation-cap',
                    'title' => '100% Board Results',
                    'desc' => 'HS Global Academy has maintained a 100% board result since its establishment, reflecting our commitment to academic excellence.',
                    'year' => '2025',
                ],
                [
                    'icon' => 'fa-futbol-o',
                    'title' => 'Sports Excellence',
                    'desc' => 'Our students actively participate in district and state-level sports events, bringing home medals and recognition for the school.',
                    'year' => '2025',
                ],
                [
                    'icon' => 'fa-star',
                    'title' => 'Modern Infrastructure',
                    'desc' => 'State-of-the-art Biology, Physics, Chemistry, and Computer Labs along with a well-stocked library and big playground.',
                    'year' => '2024',
                ],
                [
                    'icon' => 'fa-shield',
                    'title' => 'Safe & Secure Campus',
                    'desc' => 'CCTV surveillance, trained security personnel, and strict safety protocols ensure a safe and hygienic learning environment.',
                    'year' => '2024',
                ],
                [
                    'icon' => 'fa-users',
                    'title' => 'Experienced Faculty',
                    'desc' => 'Our team of qualified and dedicated teachers provides personalised attention and guidance to each student.',
                    'year' => '2024',
                ],
            ],
            'chairman' => [
                'name' => 'Mr. Sushil Kumar Singh',
                'title' => 'Director',
                'photo' => asset('assets/web/images/team/director.jpg'),
                'story' => 'Mr. Sushil Kumar Singh, the visionary Director of HS Global Academy, has dedicated his life to bringing quality education to the heart of Kushinagar. Recognising that the region lacked a world-class institution where students could truly flourish, he established HS Global Academy in 2019 with a bold mission — to create a school that blends academic rigour with holistic development. Under his stewardship, the school has grown into one of the most respected educational institutions in the region, equipped with modern infrastructure, experienced faculty, and a nurturing campus environment. Mr. Singh firmly believes that every child deserves access to excellence, and this conviction drives every decision at HS Global Academy — from curriculum design to campus safety and beyond.',
                'message' => 'HS Global Academy provides holistic education that nurtures young minds and prepares them for future success. With modern infrastructure, experienced faculty, and a focus on academic excellence and personality development, we create a safe and inspiring learning environment. I invite every parent to partner with us in shaping a bright future for their children.',
                'quote' => 'Education is the greatest gift you can give your child.',
            ],
        ];
    }

    public static function visionMission(): array
    {
        return [
            'vision' => 'To be the leading centre of holistic education in Kushinagar — nurturing young minds to become confident, responsible, and intellectually empowered individuals who contribute positively to society and the world.',
            'mission' => 'To provide a safe, inclusive, and stimulating learning environment that blends academic excellence with co-curricular development, instilling strong values, critical thinking, creativity, and a lifelong love of learning in every student.',
            'core_values' => [
                ['icon' => 'fa-star', 'title' => 'Excellence', 'text' => 'Pursuing the highest standards in academics, co-curricular activities, and personal development.'],
                ['icon' => 'fa-users', 'title' => 'Integrity', 'text' => 'Building a culture of trust, honesty, and ethical behaviour in every student and staff member.'],
                ['icon' => 'fa-leaf', 'title' => 'Innovation', 'text' => 'Embracing creative, forward-thinking approaches to teaching and learning for a future-ready generation.'],
                ['icon' => 'fa-heart', 'title' => 'Compassion', 'text' => 'Cultivating empathy, respect, and a sense of responsibility towards fellow students and the community.'],
            ],
        ];
    }

    public static function leaderMessage(string $role): array
    {
        $data = [
            'chairman' => [
                'name' => 'Mr. Sushil Kumar Singh',
                'role' => "Director's Message",
                'photo' => asset('static/images/director.jpg'),
                'message' => 'HS Global Academy provides holistic education that nurtures young minds and prepares them for future success. With modern infrastructure, experienced faculty, and a focus on academic excellence and personality development, we create a safe and inspiring learning environment. Our goal is to ensure that every student who walks through our gates leaves as a confident, capable, and compassionate individual ready to make a difference in the world.',
            ],
            'director' => [
                'name' => 'Mr. Sushil Kumar Singh',
                'role' => "Director's Message",
                'photo' => asset('static/images/director.jpg'),
                'message' => 'HS Global Academy provides holistic education that nurtures young minds and prepares them for future success. With modern infrastructure, experienced faculty, and a focus on academic excellence and personality development, we create a safe and inspiring learning environment. Our goal is to ensure that every student who walks through our gates leaves as a confident, capable, and compassionate individual ready to make a difference in the world.',
            ],
            'principal' => [
                'name' => 'Mr. Roshan Singh',
                'role' => "Principal's Message",
                'photo' => asset('static/images/principal.jpg'),
                'message' => 'At HS Global Academy, we are committed to fostering academic excellence, discipline, and strong values. Our goal is to create a nurturing environment where students develop critical thinking, creativity, and leadership skills to excel in an ever-evolving world. I believe every child has the potential to achieve greatness, and our role is to guide, encourage, and inspire them every step of the way.',
            ],
        ];

        return $data[$role] ?? $data['principal'];
    }

    // ──────────────────────────────────────────────────────────────
    // HOME
    // ──────────────────────────────────────────────────────────────

    public static function homePage(): array
    {
        return [
            'popup' => [
                'enabled' => true,
                'title' => 'Admission Enquiry 2026-27',
                'description' => 'Submit your admission enquiry to get details about eligibility, documents, and the admission process for the new session.',
                'image' => asset('static/sliders/slider1.png'),
                'link' => route('admission.enquiry'),
                'link_text' => 'Apply Now',
            ],
            // TODO: Replace with Notification::featured()->limit(5)->get(['id', 'title']);
            'notices' => [
                ['id' => 1, 'title' => 'Admission Open 2026-27 – Nursery to Class XI. Limited seats available. Enquire today!'],
                ['id' => 2, 'title' => 'Latest images from Sports Meet 2025 are now available in the Gallery section.'],
                ['id' => 3, 'title' => 'Fees information for session 2026-27 has been updated. Please check the Fee Structure page.'],
                ['id' => 4, 'title' => 'HS Global Academy welcomes you to a world-class education in Kushinagar.'],
                ['id' => 5, 'title' => 'Follow us on Facebook & Instagram @hsglobal_academy for the latest updates.'],
            ],
            // TODO: Replace with dynamic counters from Student/Teacher/Result models.
            'stats' => [
                ['number' => '1000+', 'label' => 'Students'],
                ['number' => '50+', 'label' => 'Qualified Teachers'],
                ['number' => '100%', 'label' => 'Board Result'],
                ['number' => '2000+', 'label' => 'Satisfied Parents'],
            ],
            // TODO: Replace with AcademicProgram::active()->get();
            'programs' => [
                [
                    'title' => 'Foundational Stage (Pre-Primary)',
                    'description' => 'Play-based learning with phonics, numeracy readiness, and social-emotional development.',
                    'route' => 'admission.procedure',
                ],
                [
                    'title' => 'Primary School (Classes I-V)',
                    'description' => 'Strong basics in language, mathematics, environmental studies, art, and activity-based learning.',
                    'route' => 'academics.curriculum',
                ],
                [
                    'title' => 'Middle School (Classes VI-VIII)',
                    'description' => 'Conceptual clarity, coding exposure, project work, and continuous formative assessments.',
                    'route' => 'academics.examination',
                ],
                [
                    'title' => 'Secondary & Senior Secondary',
                    'description' => 'CBSE-aligned rigorous academics with stream guidance, lab work, and board exam preparation.',
                    'route' => 'academics.fee',
                ],
            ],
            // TODO: Replace with Facility::featured()->get();
            'facilities' => [
                [
                    'icon' => 'fa-desktop',
                    'title' => 'Smart Classrooms',
                    'route' => 'facilities.smart-classrooms',
                    'image' => asset('static/images/facilities_1.jpg'),
                    'description' => 'Spacious, well-organised classrooms with proper ventilation, modern furnishings, and a focused academic environment for effective learning.',
                ],
                [
                    'icon' => 'fa-flask',
                    'title' => 'Science Labs',
                    'route' => 'facilities.science-lab',
                    'image' => asset('static/images/facilities_3.jpg'),
                    'description' => 'State-of-the-art Biology, Physics, and Chemistry labs for hands-on practical experience and concept clarity aligned with the curriculum.',
                ],
                [
                    'icon' => 'fa-book',
                    'title' => 'Library',
                    'route' => 'facilities.library',
                    'image' => asset('static/images/facilities_5.jpg'),
                    'description' => 'A well-stocked library that fosters a love for reading and research, offering books, references, and periodicals for all grades.',
                ],
                [
                    'icon' => 'fa-futbol-o',
                    'title' => 'Big Playground',
                    'route' => 'facilities.sports',
                    'image' => asset('static/images/facilities_4.jpg'),
                    'description' => 'A spacious playground that encourages physical fitness, outdoor sports, teamwork, discipline, and an active, healthy lifestyle.',
                ],
                [
                    'icon' => 'fa-laptop',
                    'title' => 'Computer Labs',
                    'route' => 'facilities.computer-lab',
                    'image' => asset('static/images/facilities_2.jpg'),
                    'description' => 'Modern computer lab with practical sessions, digital learning tools, and coding exposure to prepare students for a technology-driven future.',
                ],
                [
                    'icon' => 'fa-shield',
                    'title' => 'Safe Campus',
                    'route' => 'disclosure.safety',
                    'image' => asset('static/images/facilities_6.jpg'),
                    'description' => 'CCTV surveillance, trained security staff, and strict safety protocols ensure a secure, clean, and caring environment for every student.',
                ],
            ],
            // TODO: Replace with Achievement::latest()->take(4)->get();
            'achievements' => [
                'Best School in Kushinagar – Recognised by the community',
                'Consistent 100% Board Results since establishment',
                'State-of-the-art Labs & Modern Infrastructure',
                'Active Sports & Cultural programmes with district-level participation',
            ],
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // ACADEMICS
    // ──────────────────────────────────────────────────────────────

    public static function curriculum(): array
    {
        return [
            ['class' => 'Nursery – KG', 'subjects' => ['English', 'Hindi', 'Mathematics', 'Environmental Science', 'Art & Craft', 'Music']],
            ['class' => 'Class I – V', 'subjects' => ['English', 'Hindi', 'Mathematics', 'EVS', 'Computer Science', 'Art', 'Physical Education']],
            ['class' => 'Class VI – VIII', 'subjects' => ['English', 'Hindi', 'Mathematics', 'Science', 'Social Science', 'Sanskrit', 'Computer Science', 'Physical Education']],
            ['class' => 'Class IX – X', 'subjects' => ['English', 'Hindi', 'Mathematics', 'Science', 'Social Science', 'Information Technology (Optional)']],
            ['class' => 'Class XI – XII', 'subjects' => ['Science Stream: Physics, Chemistry, Maths/Biology, English, Computer Science', 'Commerce Stream: Accountancy, Business Studies, Economics, English, Maths/IP']],
        ];
    }

    public static function coCurricular(): array
    {
        return [
            'intro' => 'At <strong>HS Global Academy</strong>, we believe that education extends beyond the classroom. Our <strong>co-curricular activities</strong> are designed to nurture creativity, teamwork, and leadership while helping students explore their talents and interests. Through a diverse range of activities, we ensure that every child develops the confidence and skills needed to excel in all aspects of life.',

            'activities' => [
                [
                    'icon' => 'fa-futbol-o',
                    'title' => 'Sports and Physical Development',
                    'body' => 'We encourage a healthy and active lifestyle through various <strong>sports and physical activities</strong>. Our <strong>big playground</strong> provides ample space for outdoor games such as football, cricket, basketball, and athletics. Regular sports events and inter-house competitions promote teamwork, discipline, and a spirit of sportsmanship among students.',
                ],
                [
                    'icon' => 'fa-music',
                    'title' => 'Art, Music, and Creativity',
                    'body' => 'To nurture creativity and artistic expression, we offer <strong>art, music, and dance programs</strong> that allow students to explore their imaginative side. Our well-equipped art and music rooms provide a space where students can develop their artistic talents, learn musical instruments, and engage in cultural activities that enhance their confidence and self-expression.',
                ],
                [
                    'icon' => 'fa-microphone',
                    'title' => 'Public Speaking and Leadership',
                    'body' => 'HS Global Academy places a strong emphasis on <strong>communication and leadership skills</strong>. Through activities like debates, elocution, and public speaking, we help students develop critical thinking, articulation, and confidence. Participation in <strong>student council and leadership programs</strong> further equips them with essential decision-making and teamwork abilities.',
                ],
                [
                    'icon' => 'fa-users',
                    'title' => 'Clubs and Skill Development',
                    'body' => 'We offer a variety of <strong>clubs and societies</strong> such as science clubs, literary clubs, and eco clubs that engage students in hands-on learning and skill development. These platforms encourage students to explore their passions, collaborate with peers, and apply their knowledge creatively.',
                ],
                [
                    'icon' => 'fa-globe',
                    'title' => 'Cultural and Social Awareness Programs',
                    'body' => 'Our <strong>cultural events, celebrations, and community service programs</strong> instill a sense of social responsibility and respect for diverse cultures. These activities help students develop empathy, compassion, and a strong moral foundation, preparing them to be responsible global citizens.',
                ],
            ],

            'why_points' => [
                'Holistic development through a balance of academics and extracurricular activities.',
                'Opportunities to discover and nurture individual talents.',
                'Promotion of teamwork, leadership, and discipline.',
            ],

            'closing' => 'At <strong>HS Global Academy</strong>, we are committed to providing a dynamic environment where students thrive academically, creatively, and socially.',
        ];
    }

    public static function examinationPolicy(): array
    {
        return [
            'overview' => 'The school follows the CBSE Continuous and Comprehensive Evaluation (CCE) framework.',
            'terms' => [
                ['term' => 'Term I (FA1 + FA2 + SA1)', 'period' => 'April – September', 'weightage' => '50%'],
                ['term' => 'Term II (FA3 + FA4 + SA2)', 'period' => 'October – March', 'weightage' => '50%'],
            ],
            'rules' => [
                'Minimum 75% attendance is mandatory to appear in examinations.',
                'Students must carry their hall ticket / admit card on examination day.',
                'Use of unfair means will result in cancellation of the paper.',
                'Re-evaluation of answer scripts is permitted within 7 days of result declaration.',
                'Promotion is based on overall performance in both terms.',
            ],
        ];
    }

    public static function schoolTiming(): array
    {
        return [
            'schedule' => [
                ['day' => 'Monday – Friday', 'timing' => '8:00 AM – 2:30 PM', 'type' => 'regular', 'icon' => 'fa-calendar'],
                ['day' => 'Saturday', 'timing' => '8:00 AM – 12:30 PM', 'type' => 'half', 'icon' => 'fa-calendar-o'],
                ['day' => 'Sunday', 'timing' => 'Holiday', 'type' => 'holiday', 'icon' => 'fa-home'],
            ],
            'daily_breakdown' => [
                ['period' => 'Morning Assembly', 'time' => '7:50 AM – 8:10 AM', 'icon' => 'fa-sun-o'],
                ['period' => 'Period 1 & 2', 'time' => '8:10 AM – 9:40 AM', 'icon' => 'fa-book'],
                ['period' => 'Short Break', 'time' => '9:40 AM – 9:55 AM', 'icon' => 'fa-coffee'],
                ['period' => 'Period 3 & 4', 'time' => '9:55 AM – 11:25 AM', 'icon' => 'fa-book'],
                ['period' => 'Lunch Break', 'time' => '11:25 AM – 12:00 PM', 'icon' => 'fa-cutlery'],
                ['period' => 'Period 5 & 6', 'time' => '12:00 PM – 1:30 PM', 'icon' => 'fa-book'],
                ['period' => 'Period 7 / Activity', 'time' => '1:30 PM – 2:20 PM', 'icon' => 'fa-paint-brush'],
                ['period' => 'Dispersal', 'time' => '2:30 PM', 'icon' => 'fa-flag-checkered'],
            ],
            'notes' => [
                'Gates open at 7:40 AM. Students are expected to be seated by 7:50 AM.',
                'Late arrivals must report to the office and carry a parent note.',
                'Saturday schedule follows a condensed 4-period format.',
                'Pre-Primary students are dismissed at 12:00 PM on all days.',
                'Parents must collect students within 15 minutes of dispersal.',
            ],
        ];
    }

    public static function rulesRegulations(): array
    {
        return [
            'general' => [
                'Students must wear the prescribed uniform every day.',
                'Mobile phones are strictly prohibited on school premises.',
                'All students must carry their school diary / planner daily.',
                'Punctuality is expected; late arrivals require a note from parents.',
                'Vandalism or damage to school property is a punishable offence.',
            ],
            'discipline' => [
                'Bullying or harassment of any form is strictly prohibited.',
                'Students must show respect to all staff and fellow students.',
                'Usage of abusive language will attract strict disciplinary action.',
            ],
            'attendance' => [
                'A minimum of 75% attendance is required throughout the academic year.',
                'Leave must be applied in advance through the school diary.',
                'Medical leave exceeding 3 days requires a doctor\'s certificate.',
            ],
        ];
    }

    public static function uniformRegulations(): array
    {
        return [
            'boys' => [
                'Summer' => 'White half-sleeve shirt, grey trousers, black shoes, white socks, school tie & belt.',
                'Winter' => 'White full-sleeve shirt, grey trousers, navy-blue V-neck pullover, black shoes.',
            ],
            'girls' => [
                'Summer' => 'White shirt, grey skirt/salwar, black shoes, white socks, school tie.',
                'Winter' => 'White shirt, grey skirt/salwar, navy-blue V-neck pullover, black shoes.',
            ],
            'pe_uniform' => 'School house T-shirt, white track pants, white canvas shoes.',
            'note' => 'Hair must be neatly tied. No jewellery except small studs for girls.',
        ];
    }

    public static function bookList(): array
    {
        return [
            ['class' => 'Class I', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'My Big Book of EVS', 'Computer Masti 1']],
            ['class' => 'Class II', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'My Big Book of EVS', 'Computer Masti 2']],
            ['class' => 'Class III', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT EVS', 'Computer Masti 3']],
            ['class' => 'Class IV', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT EVS', 'Computer Masti 4']],
            ['class' => 'Class V', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT EVS', 'Computer Masti 5']],
            ['class' => 'Class VI', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science', 'NCERT Sanskrit']],
            ['class' => 'Class VII', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science', 'NCERT Sanskrit']],
            ['class' => 'Class VIII', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science', 'NCERT Sanskrit']],
            ['class' => 'Class IX', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science']],
            ['class' => 'Class X', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science']],
            ['class' => 'Class XI', 'books' => ['As per stream: Science / Commerce books as per CBSE guidelines.']],
            ['class' => 'Class XII', 'books' => ['As per stream: Science / Commerce books as per CBSE guidelines.']],
        ];
    }

    public static function feeStructure(): array
    {
        return [
            ['class' => 'Nursery – KG', 'admission' => '5,000', 'tuition' => '1,800/mo', 'annual' => '3,000'],
            ['class' => 'Class I – V', 'admission' => '6,000', 'tuition' => '2,200/mo', 'annual' => '3,500'],
            ['class' => 'Class VI – VIII', 'admission' => '7,000', 'tuition' => '2,800/mo', 'annual' => '4,000'],
            ['class' => 'Class IX – X', 'admission' => '8,000', 'tuition' => '3,200/mo', 'annual' => '4,500'],
            ['class' => 'Class XI – XII', 'admission' => '9,000', 'tuition' => '3,800/mo', 'annual' => '5,000'],
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // ADMISSION
    // ──────────────────────────────────────────────────────────────

    public static function admissionProcedure(): array
    {
        return [
            ['step' => 1, 'title' => 'Collect Prospectus', 'desc' => 'Obtain the school prospectus and registration form from the school office or download from the website.'],
            ['step' => 2, 'title' => 'Submit Application', 'desc' => 'Fill in the registration form and submit it along with required documents and registration fee.'],
            ['step' => 3, 'title' => 'Interaction / Test', 'desc' => 'The child and parents are invited for an interaction session. For Classes VI onwards, a written test may be conducted.'],
            ['step' => 4, 'title' => 'Admission Confirmation', 'desc' => 'On selection, an admission offer letter is issued. Fee payment confirms the seat.'],
            ['step' => 5, 'title' => 'Orientation', 'desc' => 'New students attend an orientation programme before the academic session begins.'],
        ];
    }

    public static function eligibilityCriteria(): array
    {
        return [
            ['class' => 'Nursery', 'age' => '3+ years as on 31st March of admission year'],
            ['class' => 'LKG', 'age' => '4+ years as on 31st March of admission year'],
            ['class' => 'UKG', 'age' => '5+ years as on 31st March of admission year'],
            ['class' => 'Class I', 'age' => '6+ years as on 31st March of admission year'],
            ['class' => 'Class II – V', 'age' => 'Passing previous class from a recognised school'],
            ['class' => 'Class VI – VIII', 'age' => 'Passing previous class + qualifying interaction/test'],
            ['class' => 'Class IX – X', 'age' => 'Passing previous class from CBSE/equivalent board + TC'],
            ['class' => 'Class XI', 'age' => 'Passing Class X from CBSE/equivalent board (min 60%)'],
        ];
    }

    public static function documentsRequired(): array
    {
        return [
            'Birth Certificate (original + 2 photocopies)',
            'Transfer Certificate (TC) from previous school – attested',
            'Mark Sheet / Progress Report of last class passed',
            'Aadhar Card of student (photocopy)',
            'Passport-size photographs (4 copies)',
            'Address proof (Electricity bill / Ration card / Passport)',
            'Caste Certificate (if applicable)',
            'Medical fitness certificate from a registered doctor',
        ];
    }

    public static function feePaymentRules(): array
    {
        return [
            'Fee is payable monthly by the 10th of every month.',
            'A late fee of ₹50 per day will be charged after the due date.',
            'Fee can be paid via Cash, DD, Cheque or online bank transfer.',
            'Fees once paid are non-refundable except in cases of school cancellation.',
            'Annual charges (development fee, annual fund) are payable in April.',
            'Defaulters for more than 2 months may have their name struck off the rolls.',
        ];
    }

    public static function withdrawalRules(): array
    {
        return [
            'A written application from the parent/guardian is required for withdrawal.',
            'One month\'s prior notice or fee in lieu is mandatory.',
            'All dues must be cleared before the Transfer Certificate (TC) is issued.',
            'TC is issued within 7 working days of completing the withdrawal process.',
            'In case of mid-session withdrawal, the full term\'s fee is payable.',
            'Original documents submitted at the time of admission will be returned upon withdrawal.',
        ];
    }

    public static function tcSample(): array
    {
        return [
            'note' => 'The Transfer Certificate (TC) is issued on school letterhead under the Principal\'s signature.',
            'fields' => [
                'Name of Student',
                'Mother\'s Name / Father\'s Name',
                'Date of Birth (as per school records)',
                'Nationality & Religion',
                'Class last studied & result',
                'Whether fee dues have been paid',
                'NCC / SUPW / Games participation',
                'Date of Admission & Leaving',
                'General Conduct',
            ],
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // FACILITIES
    // ──────────────────────────────────────────────────────────────

    public static function facility(string $key): array
    {
        $facilities = [
            'infrastructure' => [
                'title' => 'Infrastructure',
                'icon' => 'fa-building',
                'description' => 'HS Global Academy\'s campus in Bhaishahi Bazar, Kushinagar is designed to provide a safe, inclusive, and inspiring atmosphere where students feel encouraged to learn, explore, and grow.',
                'highlights' => [
                    'Spacious, well-ventilated modern classrooms',
                    'Dedicated blocks for different academic sections',
                    'Central Assembly area for morning prayers & events',
                    'Modern administrative block',
                    'CCTV surveillance across the entire campus',
                    'Clean and hygienic campus with eco-friendly practices',
                ],
            ],
            'smart-classrooms' => [
                'title' => 'Smart Classrooms',
                'icon' => 'fa-desktop',
                'description' => 'Our well-equipped classrooms provide a focused academic environment with proper ventilation, seating, and digital teaching tools to enhance student engagement and learning outcomes.',
                'highlights' => [
                    'Spacious, well-organised classrooms with modern furnishings',
                    'Digital teaching aids and audio-visual support',
                    'Conducive learning environment with proper lighting',
                    'Interactive collaborative learning spaces',
                    'Regular maintenance for a clean and orderly atmosphere',
                ],
            ],
            'library' => [
                'title' => 'Library',
                'icon' => 'fa-book',
                'description' => 'Our well-stocked library cultivates a love for reading and research, offering a wide range of books, reference materials, and resources for students across all classes.',
                'highlights' => [
                    'Wide collection of books across all subjects and grades',
                    'Dedicated reading room with comfortable seating',
                    'Reference section with encyclopaedias and dictionaries',
                    'Daily newspaper and periodical subscriptions',
                    'Quiet, inspiring space to foster a love of reading',
                ],
            ],
            'science-lab' => [
                'title' => 'Science Lab',
                'icon' => 'fa-flask',
                'description' => 'Our state-of-the-art Biology, Physics, and Chemistry labs provide students with hands-on experience and practical knowledge to complement classroom learning.',
                'highlights' => [
                    'Separate, fully equipped Physics Lab',
                    'Chemistry Lab with individual working benches',
                    'Biology Lab with microscopes and specimen collections',
                    'Regular practical sessions aligned with the curriculum',
                    'Trained lab assistants for safe and effective experiments',
                ],
            ],
            'computer-lab' => [
                'title' => 'Computer Lab',
                'icon' => 'fa-laptop',
                'description' => 'Our modern computer lab provides students with guided digital learning, practical sessions, and coding exposure to prepare them for a technology-driven future.',
                'highlights' => [
                    'High-configuration computer workstations for all students',
                    'Internet connectivity for research and digital learning',
                    'Licensed software for academic and creative work',
                    'Safe browsing environment with web filtering',
                    'Coding and digital literacy sessions for all grades',
                ],
            ],
            'sports' => [
                'title' => 'Sports Facility',
                'icon' => 'fa-trophy',
                'description' => 'Our big playground and sports facilities encourage physical fitness, teamwork, discipline, and a competitive spirit among students of all ages.',
                'highlights' => [
                    'Big playground for outdoor sports and physical activities',
                    'Cricket, Football, Basketball and athletics facilities',
                    'Regular sports events and inter-house competitions',
                    'Annual Sports Day celebrating student athletic achievements',
                    'Qualified physical education teachers and coaches',
                ],
            ],
        ];

        return $facilities[$key] ?? [];
    }

    // ──────────────────────────────────────────────────────────────
    // GALLERY
    // ──────────────────────────────────────────────────────────────

    public static function galleryPhotos(): array
    {
        // TODO: Replace with DB/storage query
        return array_map(fn($i) => [
            'src' => asset("static/images/img_{$i}.jpeg"),
            'thumb' => asset("static/images/img_{$i}.jpeg"),
            'caption' => "School Activity {$i}",
        ], range(1, 12));
    }

    public static function galleryVideos(): array
    {
        return [
            ['title' => 'Annual Day 2024', 'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'thumb' => asset('assets/web/images/gallery/video-thumb-1.jpg')],
            ['title' => 'Sports Day Highlights 2024', 'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'thumb' => asset('assets/web/images/gallery/video-thumb-2.jpg')],
            ['title' => 'Science Exhibition 2024', 'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'thumb' => asset('assets/web/images/gallery/video-thumb-3.jpg')],
        ];
    }

    public static function galleryEvents(string $type): array
    {
        $titles = [
            'sports' => 'Sports Events',
            'cultural' => 'Cultural Programs',
            'prize' => 'Prize Distribution',
            'achievements' => 'Student Achievements',
        ];

        $starts = [
            'sports' => 1,
            'cultural' => 6,
            'prize' => 11,
            'achievements' => 16,
        ];

        $startIndex = $starts[$type] ?? 1;

        return [
            'title' => $titles[$type] ?? 'Events',
            'photos' => array_map(fn($i) => [
                'src' => asset(sprintf('static/images/img_%d.jpeg', ((($startIndex - 1) + ($i - 1)) % 21) + 1)),
                'caption' => "{$titles[$type]} – Photo {$i}",
            ], range(1, 8)),
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // MANDATORY DISCLOSURE
    // ──────────────────────────────────────────────────────────────

    public static function disclosureGeneralInfo(): array
    {
        return [
            ['label' => 'Name of School', 'value' => 'H.S. Global Academy'],
            ['label' => 'Affiliation No.', 'value' => 'Applied'],
            ['label' => 'School No.', 'value' => 'Applied'],
            ['label' => 'Complete Address', 'value' => 'Bhaishahi Bazar, Hata, Kushinagar, Uttar Pradesh – 274204'],
            ['label' => 'Principal Name', 'value' => 'Mr. Roshan Singh'],
            ['label' => 'Contact No.', 'value' => '+91 89605 53332, +91 94510 27766'],
            ['label' => 'Email', 'value' => 'contact@hsglobalacademy.in'],
            ['label' => 'Year of Establishment', 'value' => '2019'],
            ['label' => 'Status of School', 'value' => 'Co-Educational'],
            ['label' => 'Type of Affiliation', 'value' => 'CBSE – Applied'],
            ['label' => 'Period of Affiliation', 'value' => 'Applied'],
            ['label' => 'NOC Issuing State Govt.', 'value' => 'Government of Uttar Pradesh'],
            ['label' => 'NOC No.', 'value' => 'Applied'],
            ['label' => 'Is the school recognised?', 'value' => 'Yes'],
            ['label' => 'Status of CBSE Affiliation', 'value' => 'Applied'],
        ];
    }

    public static function disclosureSchoolManagement(): array
    {
        return [
            ['name' => 'Mr. Sushil Kumar Singh', 'designation' => 'Director', 'qualification' => 'As per records'],
            ['name' => 'Mr. Roshan Singh', 'designation' => 'Principal', 'qualification' => 'As per records'],
            ['name' => 'To be updated', 'designation' => 'Manager', 'qualification' => 'As per records'],
            ['name' => 'To be updated', 'designation' => 'Parent Representative', 'qualification' => 'As per records'],
            ['name' => 'To be updated', 'designation' => 'Teacher Representative', 'qualification' => 'As per records'],
        ];
    }

    public static function disclosureInfrastructure(): array
    {
        return [
            ['item' => 'Total Campus Area', 'detail' => 'As per records'],
            ['item' => 'No. of Classrooms', 'detail' => 'As per records'],
            ['item' => 'Size of Each Classroom', 'detail' => 'As per records'],
            ['item' => 'No. of Labs (Science)', 'detail' => '3 (Physics, Chemistry, Biology)'],
            ['item' => 'Computer Lab', 'detail' => 'Available'],
            ['item' => 'Library Area', 'detail' => 'Available'],
            ['item' => 'Sports Area', 'detail' => 'Big Playground – Available'],
            ['item' => 'Separate Toilets (Boys)', 'detail' => 'Yes'],
            ['item' => 'Separate Toilets (Girls)', 'detail' => 'Yes'],
            ['item' => 'Ramps for Differently Abled', 'detail' => 'As per records'],
            ['item' => 'Drinking Water (RO)', 'detail' => 'Available throughout campus'],
            ['item' => 'Gymnasium / Indoor Hall', 'detail' => 'Yes'],
        ];
    }

    public static function disclosureStaff(): array
    {
        return [
            ['category' => 'Principal', 'required' => 1, 'available' => 1, 'trained' => 1],
            ['category' => 'Vice Principal', 'required' => 1, 'available' => 1, 'trained' => 1],
            ['category' => 'PGT Teachers', 'required' => 15, 'available' => 15, 'trained' => 15],
            ['category' => 'TGT Teachers', 'required' => 20, 'available' => 20, 'trained' => 20],
            ['category' => 'PRT Teachers', 'required' => 18, 'available' => 18, 'trained' => 18],
            ['category' => 'Lab Assistants', 'required' => 3, 'available' => 3, 'trained' => 3],
            ['category' => 'Computer Instructors', 'required' => 2, 'available' => 2, 'trained' => 2],
            ['category' => 'Librarian', 'required' => 1, 'available' => 1, 'trained' => 1],
            ['category' => 'Physical Education', 'required' => 2, 'available' => 2, 'trained' => 2],
        ];
    }

    public static function disclosureSafety(): array
    {
        return [
            'CCTVs installed at all entry/exit points and corridors.',
            'Fire extinguishers on every floor – checked every 6 months.',
            'First-aid room with trained nurse available during school hours.',
            'Biometric attendance system for all staff.',
            'Safe drinking water (RO filtered) at multiple points.',
            'Bus/van fitted with GPS tracking and speed governors.',
            'Emergency evacuation drills conducted twice a year.',
            'Child Safety & POCSO committee constituted as per law.',
            'Anti-ragging & anti-bullying policy in force.',
        ];
    }

    public static function disclosureTransport(): array
    {
        return [
            ['route' => 'Route A – North Zone', 'areas' => 'Model Town, Rohini, Pitampura', 'buses' => 2],
            ['route' => 'Route B – South Zone', 'areas' => 'Lajpat Nagar, Saket, Vasant Kunj', 'buses' => 2],
            ['route' => 'Route C – East Zone', 'areas' => 'Laxmi Nagar, Preet Vihar', 'buses' => 1],
            ['route' => 'Route D – West Zone', 'areas' => 'Dwarka, Janakpuri, Uttam Nagar', 'buses' => 2],
        ];
    }

    public static function disclosureFinancial(): array
    {
        return [
            ['head' => 'Fee Collection (Annual)', 'amount' => '₹ 1,20,00,000'],
            ['head' => 'Development Fund', 'amount' => '₹ 15,00,000'],
            ['head' => 'Salary Expenses', 'amount' => '₹ 75,00,000'],
            ['head' => 'Infrastructure Upgrades', 'amount' => '₹ 20,00,000'],
            ['head' => 'Library & Lab', 'amount' => '₹ 8,00,000'],
            ['head' => 'Sports & Activities', 'amount' => '₹ 5,00,000'],
            ['head' => 'Misc. Administrative', 'amount' => '₹ 7,00,000'],
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // CONTACT
    // ──────────────────────────────────────────────────────────────

    public static function contactInfo(): array
    {
        return [
            'address' => 'Bhaishahi Bazar, Hata, Kushinagar, Uttar Pradesh – 274204',
            'phone' => '+91 89605 53332 / +91 94510 27766',
            'email' => 'contact@hsglobalacademy.in',
            'timings' => 'Mon – Sat: 8:00 AM – 2:30 PM',
            'map_lat' => 26.7310,
            'map_lng' => 83.9960,
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // NOTIFICATIONS
    // ──────────────────────────────────────────────────────────────

    public static function notifications(): array
    {
        // TODO: Replace with Notification::latest()->paginate(10) when admin panel is ready.
        return [
            [
                'id' => 1,
                'title' => 'Admission Open 2026-27 — HS Global Academy, Kushinagar',
                'category' => 'Admissions',
                'date' => '2026-05-15',
                'excerpt' => 'Admissions are open for the 2026-27 session. Limited seats available for Nursery to Class XI.',
                'content' => 'HS Global Academy, Bhaishahi Bazar, Hata, Kushinagar is pleased to announce that admissions for the academic session 2026-27 are now open. We invite applications from deserving students for Classes Nursery to Class XI. Limited seats are available. Kindly visit the Admissions section for the detailed procedure, eligibility criteria, and required documents. For enquiries, call +91 89605 53332 or +91 94510 27766.',
            ],
            [
                'id' => 2,
                'title' => 'Sports Meet 2025 — Latest Images Now Available',
                'category' => 'Academics',
                'date' => '2026-04-10',
                'excerpt' => 'Check out the latest photos from Sports Meet 2025 in the Gallery section.',
                'content' => 'The latest images from the Sports Meet 2025, held at the HS Global Academy campus in Kushinagar, are now available in the Gallery section. The event saw enthusiastic participation from students across all classes in various track and field events. We congratulate all participants and winners!',
            ],
            [
                'id' => 3,
                'title' => 'Fee Structure 2026-27 Updated',
                'category' => 'Academics',
                'date' => '2026-04-01',
                'excerpt' => 'The updated fee structure for the 2026-27 academic session is now available.',
                'content' => 'The fee structure for the academic session 2026-27 has been updated and is available for download from the Academics section of this website. Parents are requested to review the updated fees and make payments as per the schedule. For any queries regarding fee payment, please contact the school office at +91 89605 53332.',
            ],
            [
                'id' => 4,
                'title' => 'Welcome to HS Global Academy — Best School in Kushinagar',
                'category' => 'General',
                'date' => '2026-03-15',
                'excerpt' => 'HS Global Academy is dedicated to providing world-class education in Kushinagar.',
                'content' => 'HS Global Academy, located in Bhaishahi Bazar, Hata, Kushinagar, Uttar Pradesh, is committed to providing world-class education in a safe and nurturing environment. With state-of-the-art Science and Computer Labs, a well-stocked library, a big playground, and a team of experienced faculty, we ensure every student achieves their full potential. Contact us at contact@hsglobalacademy.in or follow us on Instagram @hsglobal_academy.',
            ],
            [
                'id' => 5,
                'title' => 'Safe Campus Initiative — CCTV & Security Systems Installed',
                'category' => 'Important',
                'date' => '2026-02-20',
                'excerpt' => 'Campus-wide CCTV surveillance and security systems are now fully operational.',
                'content' => 'The safety and well-being of our students is our top priority. HS Global Academy has installed a comprehensive CCTV surveillance system and a well-trained security team across the campus. Strict safety protocols are in place to ensure that students feel safe and secure at all times. We maintain a clean and hygienic environment that supports healthy learning and overall development.',
            ],
            [
                'id' => 6,
                'title' => 'Eco-Friendly Campus Practices at HS Global Academy',
                'category' => 'Sports',
                'date' => '2026-01-15',
                'excerpt' => 'HS Global Academy promotes eco-friendly and sustainable practices on campus.',
                'content' => 'HS Global Academy is committed to instilling a sense of environmental responsibility in our students. Our school promotes eco-friendly practices such as waste management, energy conservation, and maintaining greenery on campus. Through various awareness programs and activities, we encourage students to become responsible stewards of the environment.',
            ],
        ];
    }

    public static function notification(int $id): ?array
    {
        $notifications = self::notifications();
        // TODO: Replace with Notification::findOrFail($id) when admin panel is ready.
        return collect($notifications)->firstWhere('id', $id);
    }
}
