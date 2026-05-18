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
            'name'        => 'H.S. Global Academy',
            'established' => '2019',
            'affiliation' => 'Central Board of Secondary Education (CBSE)',
            'aff_no'      => '2130XXX',
            'school_no'   => '56XXX',
            'address'     => '123, Education Lane, New Delhi – 110001',
            'email'       => 'info@hsglobalacademy.edu.in',
            'phone'       => '+91-11-XXXX-XXXX',
            'description' => 'H.S. Global Academy is a premier CBSE-affiliated institution committed to holistic
                education. Founded in 2019, we blend academic rigour with co-curricular excellence to nurture
                every student\'s potential in a safe, inclusive environment.',
            'long_description' => 'Established in 2019 by visionary educationist Mr. Harish Sharma, H.S. Global Academy has grown from a modest school with a handful of classrooms into one of the region\'s most respected centres of learning. Over the years, the institution has remained unwavering in its belief that true education transcends textbooks — it shapes character, nurtures curiosity, and builds the resilience required to thrive in an ever-changing world. Our expansive campus spans several acres of green, safe, and stimulating environment designed to spark creativity and foster intellectual growth. We offer a seamless educational journey from Pre-Primary through Senior Secondary (Class XII), guided by a team of more than 120 highly qualified and deeply committed educators who treat every student as an individual with unique strengths. Our smart classrooms, well-stocked library, state-of-the-art science and computer laboratories, dedicated arts and music rooms, and professional-grade sports facilities together create an ecosystem where academic brilliance and all-round development go hand in hand. The school proudly maintains a consistent 100% board result record for Class X and XII, while simultaneously producing national-level athletes, award-winning artists, and technology innovators. Rooted in Indian values yet open to global perspectives, H.S. Global Academy continues to evolve — embracing modern pedagogy, environmental consciousness, and community engagement — to prepare every student to become a responsible, compassionate, and empowered citizen of the world.',
            'gallery' => [
                ['src' => asset('assets/web/images/about-us/gallery-1.jpg'), 'alt' => 'School Campus', 'caption' => 'Our Sprawling Campus'],
                ['src' => asset('assets/web/images/about-us/gallery-2.jpg'), 'alt' => 'Smart Classrooms', 'caption' => 'Smart Classrooms'],
                ['src' => asset('assets/web/images/about-us/gallery-3.jpg'), 'alt' => 'Science Laboratory', 'caption' => 'Science Laboratories'],
                ['src' => asset('assets/web/images/about-us/gallery-4.jpg'), 'alt' => 'Sports Facilities', 'caption' => 'Sports & Recreation'],
                ['src' => asset('assets/web/images/about-us/gallery-5.jpg'), 'alt' => 'Cultural Events', 'caption' => 'Cultural Events'],
            ],
            'highlights'  => [
                'CBSE Affiliated (Affiliation No. 2130XXX)',
                'State-of-the-art Smart Classrooms',
                'Fully equipped Science & Computer Labs',
                'Dedicated Sports & Cultural facilities',
                'Experienced and qualified faculty',
            ],
            'achievements' => [
                [
                    'icon'  => 'fa-trophy',
                    'title' => 'State Science Exhibition',
                    'desc'  => '1st Position at the State-level Science Exhibition 2025, beating over 200 participating schools.',
                    'year'  => '2025',
                ],
                [
                    'icon'  => 'fa-graduation-cap',
                    'title' => 'Board Exam Excellence',
                    'desc'  => 'CBSE Class XII school average of 98.2% — the highest in the district for the third consecutive year.',
                    'year'  => '2025',
                ],
                [
                    'icon'  => 'fa-futbol-o',
                    'title' => 'District Football Champions',
                    'desc'  => 'Our under-17 football team clinched the District Championship title, remaining unbeaten throughout the tournament.',
                    'year'  => '2025',
                ],
                [
                    'icon'  => 'fa-star',
                    'title' => 'National Olympiad Merit',
                    'desc'  => '27 students received national merit certificates across Mathematics, Science, and English Olympiads.',
                    'year'  => '2025',
                ],
                [
                    'icon'  => 'fa-paint-brush',
                    'title' => 'National Arts Award',
                    'desc'  => 'Two students were felicitated at the National Young Artists Summit for outstanding creative artwork.',
                    'year'  => '2024',
                ],
                [
                    'icon'  => 'fa-laptop',
                    'title' => 'Tech Innovation Prize',
                    'desc'  => 'School coding team won the Regional Tech Innovation Challenge with an AI-powered attendance solution.',
                    'year'  => '2024',
                ],
            ],
            'chairman' => [
                'name'  => 'Mr. Harish Sharma',
                'title' => 'Founder & Chairman',
                'photo' => asset('assets/web/images/team/chairman.jpg'),
                'story' => 'Born in a small town where quality schooling was a distant dream for most families, Mr. Harish Sharma grew up witnessing first-hand the transformative power of education. After completing his post-graduation in Education Management from Delhi University and spending several years as a teacher and school administrator, he returned to his roots with a singular purpose — to build a school that would provide every child, regardless of background, access to world-class education. In 2019, he laid the foundation stone of H.S. Global Academy with just three classrooms, twelve teachers, and an unwavering conviction that education is the greatest equaliser. Over the years, under his visionary leadership, the school expanded to a fully equipped campus serving over 2,500 students. Mr. Sharma personally mentors teachers, champions inclusive policies, and believes that a school\'s true report card is the character and confidence of its graduates. His guiding philosophy — "Educate the mind, elevate the soul" — remains the North Star of every initiative at H.S. Global Academy.',
                'message' => 'It is my privilege to lead an institution that has, over the years, become synonymous with quality education and all-round development. At H.S. Global Academy, we believe every child is unique, and our mission is to provide an environment where each student can discover and develop their true potential. I am proud of our dedicated faculty, committed parents, and brilliant students who make this journey worthwhile. As we look to the future, our commitment to excellence, inclusivity, and innovation will only grow stronger.',
                'quote' => 'Educate the mind, elevate the soul.',
            ],
        ];
    }

    public static function visionMission(): array
    {
        return [
            'vision'  => 'To be a centre of excellence that nurtures young minds to become responsible, compassionate
                and intellectually empowered global citizens.',
            'mission' => 'We strive to provide a stimulating learning environment that fosters critical thinking,
                creativity, and character development through quality education, innovative pedagogy,
                and value-based practices.',
            'core_values' => [
                ['icon' => 'fa-star',         'title' => 'Excellence',   'text' => 'Pursuing the highest standards in academics and co-curricular activities.'],
                ['icon' => 'fa-users',        'title' => 'Integrity',    'text' => 'Building trust through honesty and ethical behaviour.'],
                ['icon' => 'fa-leaf',         'title' => 'Innovation',   'text' => 'Embracing creative and forward-thinking approaches to learning.'],
                ['icon' => 'fa-heart',        'title' => 'Compassion',   'text' => 'Cultivating empathy and respect for every individual.'],
            ],
        ];
    }

    public static function leaderMessage(string $role): array
    {
        $data = [
            'chairman' => [
                'name'    => 'Mr. Harish Sharma',
                'role'    => "Chairman's Message",
                'photo'   => asset('assets/web/images/team/chairman.jpg'),
                'message' => 'It is my privilege to lead an institution that has, over the years, become
                    synonymous with quality education and all-round development. At H.S. Global Academy,
                    we believe every child is unique, and our mission is to provide an environment where
                    each student can discover and develop their true potential. I am proud of our dedicated
                    faculty, committed parents, and brilliant students who make this journey worthwhile.',
            ],
            'director' => [
                'name'    => 'Mrs. Seema Gupta',
                'role'    => "Director's Message",
                'photo'   => asset('assets/web/images/team/director.jpg'),
                'message' => 'Education is the most powerful tool to change the world. At H.S. Global Academy,
                    we are committed to delivering world-class education while remaining rooted in our cultural
                    values. Our strategic focus on technology-enabled learning, sports, and arts ensures that
                    every student graduates as a well-rounded individual ready to face the challenges of tomorrow.',
            ],
            'principal' => [
                'name'    => 'Dr. Anjali Verma',
                'role'    => "Principal's Message",
                'photo'   => asset('assets/web/images/team/principal.jpg'),
                'message' => 'Welcome to H.S. Global Academy! As principal, I am deeply committed to creating a
                    school culture where curiosity is celebrated, learning is joyful, and every student feels
                    valued. We maintain a strong academic curriculum while also prioritising sports, arts, and
                    community service. Together, with our parents and teachers, we are shaping the leaders of
                    tomorrow.',
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
                ['id' => 1, 'title' => 'Admissions Open 2026-27 for Nursery to Class XI. Limited seats available.'],
                ['id' => 2, 'title' => 'Summer Break Homework circular has been published in the parent portal.'],
                ['id' => 3, 'title' => 'Inter-house Debate Competition scheduled on 25 May 2026.'],
                ['id' => 4, 'title' => 'School transport route revision effective from Monday, 20 May 2026.'],
                ['id' => 5, 'title' => 'CBSE mandatory disclosure documents are updated for academic session 2026-27.'],
            ],
            // TODO: Replace with dynamic counters from Student/Teacher/Result models.
            'stats' => [
                ['number' => '2500+', 'label' => 'Students'],
                ['number' => '120+',  'label' => 'Qualified Teachers'],
                ['number' => '100%',  'label' => 'Board Result (Class X)'],
                ['number' => '5000+',   'label' => 'Satisfied Parents'],
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
                    'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
                    'description' => 'Spacious, well-organised classrooms with digital teaching tools, proper ventilation, and a focused academic environment.',
                ],
                [
                    'icon' => 'fa-flask',
                    'title' => 'Science Labs',
                    'route' => 'facilities.science-lab',
                    'image' => 'https://images.unsplash.com/photo-1532187643603-ba119ca4109e?auto=format&fit=crop&w=1200&q=80',
                    'description' => 'Hands-on Physics, Chemistry, and Biology labs designed for practical exploration, safety, and concept clarity.',
                ],
                [
                    'icon' => 'fa-book',
                    'title' => 'Library',
                    'route' => 'facilities.library',
                    'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1200&q=80',
                    'description' => 'A quiet and resource-rich reading space with books, references, and digital learning support for all grades.',
                ],
                [
                    'icon' => 'fa-futbol-o',
                    'title' => 'Sports Arena',
                    'route' => 'facilities.sports',
                    'image' => 'https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=1200&q=80',
                    'description' => 'Outdoor and indoor sports infrastructure that encourages fitness, teamwork, discipline, and competitive spirit.',
                ],
                [
                    'icon' => 'fa-laptop',
                    'title' => 'Computer Labs',
                    'route' => 'facilities.computer-lab',
                    'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80',
                    'description' => 'Modern computer labs with guided digital learning, practical sessions, and coding exposure for future-ready students.',
                ],
                [
                    'icon' => 'fa-shield',
                    'title' => 'Safe Campus',
                    'route' => 'disclosure.safety',
                    'image' => 'https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&w=1200&q=80',
                    'description' => 'A secure campus with supervision, safety systems, and student-friendly processes that support daily confidence and care.',
                ],
            ],
            // TODO: Replace with Achievement::latest()->take(4)->get();
            'achievements' => [
                'State-level Science Exhibition - 1st Position (2025)',
                'CBSE Board Class XII Result - 98.2% school average',
                'District Football Championship - Winners',
                'National Olympiad - 27 students received merit certificates',
            ],
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // ACADEMICS
    // ──────────────────────────────────────────────────────────────

    public static function curriculum(): array
    {
        return [
            ['class' => 'Nursery – KG',   'subjects' => ['English', 'Hindi', 'Mathematics', 'Environmental Science', 'Art & Craft', 'Music']],
            ['class' => 'Class I – V',    'subjects' => ['English', 'Hindi', 'Mathematics', 'EVS', 'Computer Science', 'Art', 'Physical Education']],
            ['class' => 'Class VI – VIII','subjects' => ['English', 'Hindi', 'Mathematics', 'Science', 'Social Science', 'Sanskrit', 'Computer Science', 'Physical Education']],
            ['class' => 'Class IX – X',   'subjects' => ['English', 'Hindi', 'Mathematics', 'Science', 'Social Science', 'Information Technology (Optional)']],
            ['class' => 'Class XI – XII', 'subjects' => ['Science Stream: Physics, Chemistry, Maths/Biology, English, Computer Science', 'Commerce Stream: Accountancy, Business Studies, Economics, English, Maths/IP']],
        ];
    }

    public static function coCurricular(): array
    {
        return [
            'intro' => 'At <strong>HS Global Academy</strong>, we believe that education extends beyond the classroom. Our <strong>co-curricular activities</strong> are designed to nurture creativity, teamwork, and leadership while helping students explore their talents and interests. Through a diverse range of activities, we ensure that every child develops the confidence and skills needed to excel in all aspects of life.',

            'activities' => [
                [
                    'icon'  => 'fa-futbol-o',
                    'title' => 'Sports and Physical Development',
                    'body'  => 'We encourage a healthy and active lifestyle through various <strong>sports and physical activities</strong>. Our <strong>big playground</strong> provides ample space for outdoor games such as football, cricket, basketball, and athletics. Regular sports events and inter-house competitions promote teamwork, discipline, and a spirit of sportsmanship among students.',
                ],
                [
                    'icon'  => 'fa-music',
                    'title' => 'Art, Music, and Creativity',
                    'body'  => 'To nurture creativity and artistic expression, we offer <strong>art, music, and dance programs</strong> that allow students to explore their imaginative side. Our well-equipped art and music rooms provide a space where students can develop their artistic talents, learn musical instruments, and engage in cultural activities that enhance their confidence and self-expression.',
                ],
                [
                    'icon'  => 'fa-microphone',
                    'title' => 'Public Speaking and Leadership',
                    'body'  => 'HS Global Academy places a strong emphasis on <strong>communication and leadership skills</strong>. Through activities like debates, elocution, and public speaking, we help students develop critical thinking, articulation, and confidence. Participation in <strong>student council and leadership programs</strong> further equips them with essential decision-making and teamwork abilities.',
                ],
                [
                    'icon'  => 'fa-users',
                    'title' => 'Clubs and Skill Development',
                    'body'  => 'We offer a variety of <strong>clubs and societies</strong> such as science clubs, literary clubs, and eco clubs that engage students in hands-on learning and skill development. These platforms encourage students to explore their passions, collaborate with peers, and apply their knowledge creatively.',
                ],
                [
                    'icon'  => 'fa-globe',
                    'title' => 'Cultural and Social Awareness Programs',
                    'body'  => 'Our <strong>cultural events, celebrations, and community service programs</strong> instill a sense of social responsibility and respect for diverse cultures. These activities help students develop empathy, compassion, and a strong moral foundation, preparing them to be responsible global citizens.',
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
            'terms'    => [
                ['term' => 'Term I (FA1 + FA2 + SA1)',  'period' => 'April – September', 'weightage' => '50%'],
                ['term' => 'Term II (FA3 + FA4 + SA2)', 'period' => 'October – March',   'weightage' => '50%'],
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
                ['day' => 'Saturday',        'timing' => '8:00 AM – 12:30 PM', 'type' => 'half',    'icon' => 'fa-calendar-o'],
                ['day' => 'Sunday',          'timing' => 'Holiday',            'type' => 'holiday',  'icon' => 'fa-home'],
            ],
            'daily_breakdown' => [
                ['period' => 'Morning Assembly',    'time' => '7:50 AM – 8:10 AM',  'icon' => 'fa-sun-o'],
                ['period' => 'Period 1 & 2',        'time' => '8:10 AM – 9:40 AM',  'icon' => 'fa-book'],
                ['period' => 'Short Break',         'time' => '9:40 AM – 9:55 AM',  'icon' => 'fa-coffee'],
                ['period' => 'Period 3 & 4',        'time' => '9:55 AM – 11:25 AM', 'icon' => 'fa-book'],
                ['period' => 'Lunch Break',         'time' => '11:25 AM – 12:00 PM','icon' => 'fa-cutlery'],
                ['period' => 'Period 5 & 6',        'time' => '12:00 PM – 1:30 PM', 'icon' => 'fa-book'],
                ['period' => 'Period 7 / Activity', 'time' => '1:30 PM – 2:20 PM',  'icon' => 'fa-paint-brush'],
                ['period' => 'Dispersal',           'time' => '2:30 PM',            'icon' => 'fa-flag-checkered'],
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
            'note'        => 'Hair must be neatly tied. No jewellery except small studs for girls.',
        ];
    }

    public static function bookList(): array
    {
        return [
            ['class' => 'Class I',   'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'My Big Book of EVS', 'Computer Masti 1']],
            ['class' => 'Class II',  'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'My Big Book of EVS', 'Computer Masti 2']],
            ['class' => 'Class III', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT EVS', 'Computer Masti 3']],
            ['class' => 'Class IV',  'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT EVS', 'Computer Masti 4']],
            ['class' => 'Class V',   'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT EVS', 'Computer Masti 5']],
            ['class' => 'Class VI',  'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science', 'NCERT Sanskrit']],
            ['class' => 'Class VII', 'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science', 'NCERT Sanskrit']],
            ['class' => 'Class VIII','books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science', 'NCERT Sanskrit']],
            ['class' => 'Class IX',  'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science']],
            ['class' => 'Class X',   'books' => ['NCERT English', 'NCERT Hindi', 'NCERT Maths', 'NCERT Science', 'NCERT Social Science']],
            ['class' => 'Class XI',  'books' => ['As per stream: Science / Commerce books as per CBSE guidelines.']],
            ['class' => 'Class XII', 'books' => ['As per stream: Science / Commerce books as per CBSE guidelines.']],
        ];
    }

    public static function feeStructure(): array
    {
        return [
            ['class' => 'Nursery – KG',   'admission' => '5,000', 'tuition' => '1,800/mo', 'annual' => '3,000'],
            ['class' => 'Class I – V',    'admission' => '6,000', 'tuition' => '2,200/mo', 'annual' => '3,500'],
            ['class' => 'Class VI – VIII','admission' => '7,000', 'tuition' => '2,800/mo', 'annual' => '4,000'],
            ['class' => 'Class IX – X',   'admission' => '8,000', 'tuition' => '3,200/mo', 'annual' => '4,500'],
            ['class' => 'Class XI – XII', 'admission' => '9,000', 'tuition' => '3,800/mo', 'annual' => '5,000'],
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // ADMISSION
    // ──────────────────────────────────────────────────────────────

    public static function admissionProcedure(): array
    {
        return [
            ['step' => 1, 'title' => 'Collect Prospectus',     'desc' => 'Obtain the school prospectus and registration form from the school office or download from the website.'],
            ['step' => 2, 'title' => 'Submit Application',     'desc' => 'Fill in the registration form and submit it along with required documents and registration fee.'],
            ['step' => 3, 'title' => 'Interaction / Test',     'desc' => 'The child and parents are invited for an interaction session. For Classes VI onwards, a written test may be conducted.'],
            ['step' => 4, 'title' => 'Admission Confirmation', 'desc' => 'On selection, an admission offer letter is issued. Fee payment confirms the seat.'],
            ['step' => 5, 'title' => 'Orientation',            'desc' => 'New students attend an orientation programme before the academic session begins.'],
        ];
    }

    public static function eligibilityCriteria(): array
    {
        return [
            ['class' => 'Nursery',          'age' => '3+ years as on 31st March of admission year'],
            ['class' => 'LKG',              'age' => '4+ years as on 31st March of admission year'],
            ['class' => 'UKG',              'age' => '5+ years as on 31st March of admission year'],
            ['class' => 'Class I',          'age' => '6+ years as on 31st March of admission year'],
            ['class' => 'Class II – V',     'age' => 'Passing previous class from a recognised school'],
            ['class' => 'Class VI – VIII',  'age' => 'Passing previous class + qualifying interaction/test'],
            ['class' => 'Class IX – X',     'age' => 'Passing previous class from CBSE/equivalent board + TC'],
            ['class' => 'Class XI',         'age' => 'Passing Class X from CBSE/equivalent board (min 60%)'],
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
            'note'   => 'The Transfer Certificate (TC) is issued on school letterhead under the Principal\'s signature.',
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
                'title'       => 'Infrastructure',
                'icon'        => 'fa-building',
                'description' => 'Our sprawling campus spans over 3 acres with purpose-built blocks for primary and secondary sections.',
                'highlights'  => [
                    '30+ spacious, well-ventilated classrooms',
                    'Dedicated blocks for Science, Commerce & Arts streams',
                    'Central Assembly Hall (capacity: 1,000)',
                    'Modern administrative block',
                    'Separate hostel facility (optional)',
                    'CCTV surveillance across the entire campus',
                ],
            ],
            'smart-classrooms' => [
                'title'       => 'Smart Classrooms',
                'icon'        => 'fa-desktop',
                'description' => 'All classrooms are equipped with interactive smart boards and audio-visual systems for enhanced learning.',
                'highlights'  => [
                    '40 smart classrooms with interactive flat panels',
                    'High-speed Wi-Fi connectivity throughout the building',
                    'Digital content library integrated with CBSE curriculum',
                    'Teacher training programme for EdTech tools',
                    'Online assessment and real-time progress tracking',
                ],
            ],
            'library' => [
                'title'       => 'Library',
                'icon'        => 'fa-book',
                'description' => 'Our well-stocked library houses over 15,000 books, periodicals, and digital resources.',
                'highlights'  => [
                    '15,000+ books across all subjects and genres',
                    'Dedicated reading room with seating for 80 students',
                    'E-library with access to digital journals and NCERT e-books',
                    'Daily newspaper and monthly magazine subscriptions',
                    'Barcode-based book issue/return system',
                ],
            ],
            'science-lab' => [
                'title'       => 'Science Lab',
                'icon'        => 'fa-flask',
                'description' => 'Separate, fully equipped laboratories for Physics, Chemistry, and Biology.',
                'highlights'  => [
                    'Physics Lab with modern apparatus (30 setups)',
                    'Chemistry Lab with individual working benches',
                    'Biology Lab with microscopes and specimen collection',
                    'Annual science fair and project exhibitions',
                    'Trained lab assistants for each department',
                ],
            ],
            'computer-lab' => [
                'title'       => 'Computer Lab',
                'icon'        => 'fa-laptop',
                'description' => 'Two state-of-the-art computer labs with the latest hardware and software.',
                'highlights'  => [
                    '60 high-configuration workstations',
                    'Licensed Microsoft Office & programming tools',
                    'Dedicated broadband internet (100 Mbps)',
                    'Web filtering and safe browsing enabled',
                    'Robotics & Coding workshops for all grades',
                ],
            ],
            'sports' => [
                'title'       => 'Sports Facility',
                'icon'        => 'fa-trophy',
                'description' => 'Comprehensive sports infrastructure to develop physical fitness and sportsmanship.',
                'highlights'  => [
                    'Full-size cricket ground with practice nets',
                    'Football, Basketball & Volleyball courts',
                    'Badminton & Table Tennis facilities (indoor)',
                    'Athletics track (200 m)',
                    'Annual Sports Day with inter-house competitions',
                    'Qualified physical education teachers & coaches',
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
            'src'      => asset("static/images/img_{$i}.jpeg"),
            'thumb'    => asset("static/images/img_{$i}.jpeg"),
            'caption'  => "School Activity {$i}",
        ], range(1, 12));
    }

    public static function galleryVideos(): array
    {
        return [
            ['title' => 'Annual Day 2024',           'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'thumb' => asset('assets/web/images/gallery/video-thumb-1.jpg')],
            ['title' => 'Sports Day Highlights 2024','url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'thumb' => asset('assets/web/images/gallery/video-thumb-2.jpg')],
            ['title' => 'Science Exhibition 2024',   'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'thumb' => asset('assets/web/images/gallery/video-thumb-3.jpg')],
        ];
    }

    public static function galleryEvents(string $type): array
    {
        $titles = [
            'sports'   => 'Sports Events',
            'cultural' => 'Cultural Programs',
            'prize'    => 'Prize Distribution',
            'achievements' => 'Student Achievements',
        ];

        $starts = [
            'sports'       => 1,
            'cultural'     => 6,
            'prize'        => 11,
            'achievements' => 16,
        ];

        $startIndex = $starts[$type] ?? 1;

        return [
            'title'  => $titles[$type] ?? 'Events',
            'photos' => array_map(fn($i) => [
                'src'     => asset(sprintf('static/images/img_%d.jpeg', ((($startIndex - 1) + ($i - 1)) % 21) + 1)),
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
            ['label' => 'Name of School',             'value' => 'H.S. Global Academy'],
            ['label' => 'Affiliation No.',             'value' => '2130XXX'],
            ['label' => 'School No.',                  'value' => '56XXX'],
            ['label' => 'Complete Address',            'value' => '123, Education Lane, New Delhi – 110001'],
            ['label' => 'Principal Name',              'value' => 'Dr. Anjali Verma'],
            ['label' => 'Contact No.',                 'value' => '+91-11-XXXX-XXXX'],
            ['label' => 'Email',                       'value' => 'info@hsglobalacademy.edu.in'],
            ['label' => 'Year of Establishment',       'value' => '2019'],
            ['label' => 'Status of School',            'value' => 'Co-Educational'],
            ['label' => 'Type of Affiliation',         'value' => 'Permanent'],
            ['label' => 'Period of Affiliation',       'value' => '01/04/2019 – 31/03/2030'],
            ['label' => 'NOC Issuing State Govt.',     'value' => 'Government of Delhi'],
            ['label' => 'NOC No.',                     'value' => 'DL/EDU/XXX/2004'],
            ['label' => 'Is the school recognised?',   'value' => 'Yes'],
            ['label' => 'Status of CBSE Affiliation',  'value' => 'Permanent'],
        ];
    }

    public static function disclosureSchoolManagement(): array
    {
        return [
            ['name' => 'Mr. Harish Sharma',  'designation' => 'Chairman',          'qualification' => 'M.Com, LLB'],
            ['name' => 'Mrs. Seema Gupta',   'designation' => 'Director',           'qualification' => 'MBA'],
            ['name' => 'Dr. Anjali Verma',   'designation' => 'Principal',          'qualification' => 'Ph.D, M.Ed'],
            ['name' => 'Mr. Rakesh Tiwari',  'designation' => 'Manager',            'qualification' => 'B.Com, LLB'],
            ['name' => 'Mrs. Priya Singh',   'designation' => 'Parent Representative','qualification' => 'M.A.'],
            ['name' => 'Mr. Suresh Kumar',   'designation' => 'Teacher Representative','qualification' => 'M.Sc, B.Ed'],
        ];
    }

    public static function disclosureInfrastructure(): array
    {
        return [
            ['item' => 'Total Campus Area',            'detail' => '3 Acres (12,141 sq. m.)'],
            ['item' => 'No. of Classrooms',            'detail' => '32'],
            ['item' => 'Size of Each Classroom',       'detail' => '6m × 8m'],
            ['item' => 'No. of Labs (Science)',        'detail' => '3 (Physics, Chemistry, Biology)'],
            ['item' => 'Computer Lab',                 'detail' => '2 Labs – 60 systems total'],
            ['item' => 'Library Area',                 'detail' => '250 sq. m.'],
            ['item' => 'Sports Area',                  'detail' => '5,000 sq. m.'],
            ['item' => 'Separate Toilets (Boys)',      'detail' => 'Yes'],
            ['item' => 'Separate Toilets (Girls)',     'detail' => 'Yes'],
            ['item' => 'Ramps for Differently Abled',  'detail' => 'Yes'],
            ['item' => 'Drinking Water (RO)',          'detail' => 'Available throughout campus'],
            ['item' => 'Gymnasium / Indoor Hall',      'detail' => 'Yes'],
        ];
    }

    public static function disclosureStaff(): array
    {
        return [
            ['category' => 'Principal',          'required' => 1,  'available' => 1,  'trained' => 1],
            ['category' => 'Vice Principal',      'required' => 1,  'available' => 1,  'trained' => 1],
            ['category' => 'PGT Teachers',        'required' => 15, 'available' => 15, 'trained' => 15],
            ['category' => 'TGT Teachers',        'required' => 20, 'available' => 20, 'trained' => 20],
            ['category' => 'PRT Teachers',        'required' => 18, 'available' => 18, 'trained' => 18],
            ['category' => 'Lab Assistants',      'required' => 3,  'available' => 3,  'trained' => 3],
            ['category' => 'Computer Instructors','required' => 2,  'available' => 2,  'trained' => 2],
            ['category' => 'Librarian',           'required' => 1,  'available' => 1,  'trained' => 1],
            ['category' => 'Physical Education',  'required' => 2,  'available' => 2,  'trained' => 2],
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
            ['route' => 'Route A – North Zone',   'areas' => 'Model Town, Rohini, Pitampura',   'buses' => 2],
            ['route' => 'Route B – South Zone',   'areas' => 'Lajpat Nagar, Saket, Vasant Kunj','buses' => 2],
            ['route' => 'Route C – East Zone',    'areas' => 'Laxmi Nagar, Preet Vihar',         'buses' => 1],
            ['route' => 'Route D – West Zone',    'areas' => 'Dwarka, Janakpuri, Uttam Nagar',   'buses' => 2],
        ];
    }

    public static function disclosureFinancial(): array
    {
        return [
            ['head' => 'Fee Collection (Annual)',  'amount' => '₹ 1,20,00,000'],
            ['head' => 'Development Fund',         'amount' => '₹ 15,00,000'],
            ['head' => 'Salary Expenses',          'amount' => '₹ 75,00,000'],
            ['head' => 'Infrastructure Upgrades',  'amount' => '₹ 20,00,000'],
            ['head' => 'Library & Lab',            'amount' => '₹ 8,00,000'],
            ['head' => 'Sports & Activities',      'amount' => '₹ 5,00,000'],
            ['head' => 'Misc. Administrative',     'amount' => '₹ 7,00,000'],
        ];
    }

    // ──────────────────────────────────────────────────────────────
    // CONTACT
    // ──────────────────────────────────────────────────────────────

    public static function contactInfo(): array
    {
        return [
            'address' => '123, Education Lane, New Delhi – 110001',
            'phone'   => '+91-11-XXXX-XXXX',
            'email'   => 'info@hsglobalacademy.edu.in',
            'timings' => 'Mon – Sat: 8:00 AM – 4:00 PM',
            'map_lat' => 28.6139,
            'map_lng' => 77.2090,
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
                'id'       => 1,
                'title'    => 'Admissions Open for 2026-27 Academic Session',
                'category' => 'Admissions',
                'date'     => '2026-05-15',
                'excerpt'  => 'Registration forms are now available. Limited seats in all classes.',
                'content'  => 'H.S. Global Academy is pleased to announce that admissions for the academic session 2026-27 are now open. We invite applications from deserving students for Classes Nursery to Class XI. Limited seats are available. Kindly visit the Admissions section for detailed procedure, eligibility criteria, and required documents.',
            ],
            [
                'id'       => 2,
                'title'    => 'Summer Holidays Homework Assignment Published',
                'category' => 'Academics',
                'date'     => '2026-05-12',
                'excerpt'  => 'Holiday homework for all classes is now available in the parent portal.',
                'content'  => 'The holiday homework assignment for the summer break (May – June 2026) has been published and is accessible through the parent portal. Students are encouraged to complete assignments during the break to maintain continuity in learning. Teachers will be available for clarifications via email.',
            ],
            [
                'id'       => 3,
                'title'    => 'Inter-House Debate Competition Scheduled',
                'category' => 'Activities',
                'date'     => '2026-05-10',
                'excerpt'  => 'Debate competition between four school houses on May 25, 2026.',
                'content'  => 'The annual Inter-House Debate Competition is scheduled for May 25, 2026 at the school auditorium. Classes VIII to XII are invited to participate. Topics will be announced one week in advance. Winners will be awarded certificates and cash prizes. Parents and staff are welcome to attend.',
            ],
            [
                'id'       => 4,
                'title'    => 'School Transport Route Revision Effective From May 20',
                'category' => 'Transport',
                'date'     => '2026-05-08',
                'excerpt'  => 'New pickup points and timings for all transport routes.',
                'content'  => 'Effective from Monday, May 20, 2026, the school transport routes have been reorganised to ensure better efficiency and on-time arrival. Updated pickup points, timings, and route maps have been shared with all parents. In case of any queries, please contact the Transport Office.',
            ],
            [
                'id'       => 5,
                'title'    => 'CBSE Mandatory Disclosure Documents Updated',
                'category' => 'Important',
                'date'     => '2026-05-05',
                'excerpt'  => 'All mandatory disclosures for 2026-27 are now live.',
                'content'  => 'As per CBSE norms, all mandatory disclosure documents for the academic session 2026-27 have been updated and are now available in the Mandatory Disclosure section of this website. Parents and guardians are requested to review these documents for transparency and compliance.',
            ],
            [
                'id'       => 6,
                'title'    => 'Annual Sports Day Preliminary Round Winners Announced',
                'category' => 'Sports',
                'date'     => '2026-05-02',
                'excerpt'  => 'Congratulations to all students who qualified for the finals.',
                'content'  => 'The results of the preliminary round of the Annual Sports Day have been declared. We congratulate all students who have qualified for the finals, scheduled for May 30, 2026. Best wishes to all participants.',
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
