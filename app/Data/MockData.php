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
            'established' => '2005',
            'affiliation' => 'Central Board of Secondary Education (CBSE)',
            'aff_no'      => '2130XXX',
            'school_no'   => '56XXX',
            'address'     => '123, Education Lane, New Delhi – 110001',
            'email'       => 'info@hsglobalacademy.edu.in',
            'phone'       => '+91-11-XXXX-XXXX',
            'description' => 'H.S. Global Academy is a premier CBSE-affiliated institution committed to holistic
                education. Founded in 2005, we blend academic rigour with co-curricular excellence to nurture
                every student\'s potential in a safe, inclusive environment.',
            'highlights'  => [
                'CBSE Affiliated (Affiliation No. 2130XXX)',
                'State-of-the-art Smart Classrooms',
                'Fully equipped Science & Computer Labs',
                'Dedicated Sports & Cultural facilities',
                'Experienced and qualified faculty',
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
            ['day' => 'Monday – Friday', 'timing' => '8:00 AM – 2:30 PM'],
            ['day' => 'Saturday',        'timing' => '8:00 AM – 12:30 PM'],
            ['day' => 'Sunday',          'timing' => 'Holiday'],
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
            'src'      => asset("assets/web/images/gallery/photo-{$i}.jpg"),
            'thumb'    => asset("assets/web/images/gallery/photo-{$i}.jpg"),
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

        return [
            'title'  => $titles[$type] ?? 'Events',
            'photos' => array_map(fn($i) => [
                'src'     => asset("assets/web/images/gallery/{$type}-{$i}.jpg"),
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
            ['label' => 'Year of Establishment',       'value' => '2005'],
            ['label' => 'Status of School',            'value' => 'Co-Educational'],
            ['label' => 'Type of Affiliation',         'value' => 'Permanent'],
            ['label' => 'Period of Affiliation',       'value' => '01/04/2005 – 31/03/2030'],
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
}
