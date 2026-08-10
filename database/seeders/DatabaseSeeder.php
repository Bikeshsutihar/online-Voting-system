<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Candidate;
use App\Models\Election;
use App\Models\Vote;
use App\Models\Voter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create upload directories and sample SVG/PNG placeholder files in public/uploads/
        $logoDir = public_path('uploads/candidate_logos');
        $candIdDir = public_path('uploads/candidate_ids');
        $voterIdDir = public_path('uploads/voter_ids');

        if (!file_exists($logoDir)) mkdir($logoDir, 0777, true);
        if (!file_exists($candIdDir)) mkdir($candIdDir, 0777, true);
        if (!file_exists($voterIdDir)) mkdir($voterIdDir, 0777, true);

        // Helper function to write simple SVG placeholder files
        $createSvg = function ($path, $text, $bgColor, $textColor) {
            $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" viewBox="0 0 300 300">'
                . '<rect width="300" height="300" fill="' . $bgColor . '"/>'
                . '<text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="sans-serif" font-size="22" font-weight="bold" fill="' . $textColor . '">' . $text . '</text>'
                . '</svg>';
            file_put_contents($path, $svg);
        };

        $createSvg($logoDir . '/party_a.svg', 'ALLIANCE A', '#2563eb', '#ffffff');
        $createSvg($logoDir . '/party_b.svg', 'YOUTH B', '#10b981', '#ffffff');
        $createSvg($logoDir . '/party_c.svg', 'UNITED C', '#8b5cf6', '#ffffff');

        $createSvg($candIdDir . '/cand_1.svg', 'ID: C-01', '#1e293b', '#60a5fa');
        $createSvg($candIdDir . '/cand_2.svg', 'ID: C-02', '#1e293b', '#34d399');
        $createSvg($candIdDir . '/cand_3.svg', 'ID: C-03', '#1e293b', '#a78bfa');

        $createSvg($voterIdDir . '/voter_default.svg', 'VOTER ID', '#334155', '#94a3b8');

        // 2. Create Admin Account
        $admin = Admin::updateOrCreate([
            'email' => 'admin@university.edu'
        ], [
            'name' => 'System Administrator',
            'phone_no' => '1234567890',
            'password' => Hash::make('password'),
            'role' => 'SuperAdmin',
        ]);

        // 3. Create Active Election Session
        $election = Election::updateOrCreate([
            'title' => 'Student Union Executive Council Election 2026'
        ], [
            'description' => 'Annual student election to elect President, Vice President, and General Secretary.',
            'start_date' => now()->subDays(1),
            'end_date' => now()->addDays(6),
            'status' => 'active',
        ]);

        // 4. Create Candidates
        $cand1 = Candidate::updateOrCreate([
            'email' => 'sarah.jenkins@university.edu'
        ], [
            'election_id' => $election->id,
            'name' => 'Sarah Jenkins',
            'dob' => '2003-05-14',
            'class' => 'CS - 4th Year',
            'student_id' => 'STU-2026-001',
            'party_name' => 'Progressive Student Alliance',
            'logo' => 'uploads/candidate_logos/party_a.svg',
            'phone_no' => '+1 555-0101',
            'id_card_photo' => 'uploads/candidate_ids/cand_1.svg',
            'status' => 'approved',
            'applied_at' => now()->subDays(2),
            'approved_by' => $admin->id,
        ]);

        $cand2 = Candidate::updateOrCreate([
            'email' => 'marcus.vance@university.edu'
        ], [
            'election_id' => $election->id,
            'name' => 'Marcus Vance',
            'dob' => '2002-11-20',
            'class' => 'IT - 3rd Year',
            'student_id' => 'STU-2026-002',
            'party_name' => 'Youth Leadership Movement',
            'logo' => 'uploads/candidate_logos/party_b.svg',
            'phone_no' => '+1 555-0102',
            'id_card_photo' => 'uploads/candidate_ids/cand_2.svg',
            'status' => 'approved',
            'applied_at' => now()->subDays(2),
            'approved_by' => $admin->id,
        ]);

        $cand3 = Candidate::updateOrCreate([
            'email' => 'emily.chen@university.edu'
        ], [
            'election_id' => $election->id,
            'name' => 'Emily Chen',
            'dob' => '2004-02-10',
            'class' => 'SE - 3rd Year',
            'student_id' => 'STU-2026-003',
            'party_name' => 'United Students Front',
            'logo' => 'uploads/candidate_logos/party_c.svg',
            'phone_no' => '+1 555-0103',
            'id_card_photo' => 'uploads/candidate_ids/cand_3.svg',
            'status' => 'approved',
            'applied_at' => now()->subDays(1),
            'approved_by' => $admin->id,
        ]);

        // 5. Create Voters
        $voter1 = Voter::updateOrCreate([
            'email' => 'voter1@university.edu'
        ], [
            'name' => 'David Miller',
            'phone_no' => '+1 555-0201',
            'class' => 'CS - 2nd Year',
            'student_id' => 'STU-2026-101',
            'dob' => '2004-08-15',
            'id_card_photo' => 'uploads/voter_ids/voter_default.svg',
            'password' => Hash::make('password'),
            'is_verified' => true,
        ]);

        $voter2 = Voter::updateOrCreate([
            'email' => 'voter2@university.edu'
        ], [
            'name' => 'Jessica Taylor',
            'phone_no' => '+1 555-0202',
            'class' => 'IT - 4th Year',
            'student_id' => 'STU-2026-102',
            'dob' => '2003-01-25',
            'id_card_photo' => 'uploads/voter_ids/voter_default.svg',
            'password' => Hash::make('password'),
            'is_verified' => true,
        ]);

        $voter3 = Voter::updateOrCreate([
            'email' => 'voter3@university.edu'
        ], [
            'name' => 'Robert Wilson',
            'phone_no' => '+1 555-0203',
            'class' => 'SE - 1st Year',
            'student_id' => 'STU-2026-103',
            'dob' => '2005-09-05',
            'id_card_photo' => 'uploads/voter_ids/voter_default.svg',
            'password' => Hash::make('password'),
            'is_verified' => true,
        ]);

        // 6. Create Votes
        Vote::updateOrCreate([
            'voter_id' => $voter1->id,
            'election_id' => $election->id,
        ], [
            'candidate_id' => $cand1->id,
            'voted_at' => now()->subHours(5),
            'ip_address' => '192.168.1.45',
        ]);

        Vote::updateOrCreate([
            'voter_id' => $voter2->id,
            'election_id' => $election->id,
        ], [
            'candidate_id' => $cand2->id,
            'voted_at' => now()->subHours(2),
            'ip_address' => '192.168.1.88',
        ]);

        Vote::updateOrCreate([
            'voter_id' => $voter3->id,
            'election_id' => $election->id,
        ], [
            'candidate_id' => $cand1->id,
            'voted_at' => now()->subMinutes(30),
            'ip_address' => '127.0.0.1',
        ]);
    }
}
