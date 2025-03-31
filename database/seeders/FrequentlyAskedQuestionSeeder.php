<?php

namespace Database\Seeders;

use App\Domains\FrequentlyAskedQuestion\Models\FrequentlyAskedQuestion;
use Illuminate\Database\Seeder;

class FrequentlyAskedQuestionSeeder extends Seeder
{
    public function run()
    {
        FrequentlyAskedQuestion::factory()->createMany([
            [
                'question' => 'What is G-Castle Internet Cafe?',
                'answer' => '<p>Think of us as a modern-day gaming arcade - only we\'ve swapped out classic arcade machines for gaming computers.</p><p><br></p><p>It\'s simple: purchase some time, log in, fire up your favourite game, and play. Discord is great, but there\'s nothing quite like sitting next to your mates, celebrating victories, sharing laughs, grabbing food together, and experiencing epic gaming moments side by side.&nbsp;</p><p><br></p><p>At G-Castle, it\'s all about gaming, community, and having fun IRL.</p>',
            ],
            [
                'question' => 'Where are you located?',
                'answer' => "<p>We're a bit of a hidden gem and don't have a distinctive street sign. Look for the \"comics etc.\" sign on 81 Elizabeth Street. We are in the basement of the same building!</p>",
            ],
            [
                'question' => 'What is the minimum age to enter?',
                'answer' => '<p>We don\'t have a minimum age to enter.</p>',
            ],
            [
                'question' => 'How much does membership cost?',
                'answer' => "<p>Membership is free. However, you are required to top up a minimum of $10 (2.5 hours) to activate membership. You will also need a photo ID (i.e. student card, driver's license, passport) and a phone number that can be verified by us.</p>",
            ],
            [
                'question' => 'When does my membership or time expire?',
                'answer' => '<p>Your membership will be deleted after 2 years of inactivity. Your remaining time will be deleted after 365 days of purchase.</p>',
            ],
            [
                'question' => 'Do you have any terms and conditions?',
                'answer' => '<p>You agree to the following terms and conditions by utilising our services;</p><p><br></p><ul><li>Transfer of the membership or time is not possible.</li><li>Account sharing is not permitted.</li><li>The membership expires after 2 years of inactivity.</li><li>You are responsible for logging out after each session.</li><li>No vaping or smoking inside of the premise.</li><li>No offensive, illegal or sexual contents are to be watched at the premise.</li><li>Behaviours that are rude and offensive towards the staff members and other patrons will not be tolerated.</li><li>No alcoholic beverage is to be consumed inside of the premise.</li><li>Outside food and drinks are to be binned and cleaned.</li><li>The management has sole discretion to either issue a warning or suspend your account for any breaches.</li></ul><p><br></p><p>We would also be very appreciative of good hygiene practices from our customers! And, may unfortunately refuse to serve you in extreme cases.</p>',
            ],
            [
                'question' => 'What payment methods do you have available?',
                'answer' => '<p>We accept cash and have an EFTPOS facility that accepts standard debit and credit cards, as well as Apple Pay, Google Pay, etc. Please note that a 2.5% surcharge applies to card transactions</p>',
            ],
            [
                'question' => 'Do you sell food or drinks?',
                'answer' => '<p>We sell a range of snacks (i.e: chips and chocolates) and non-alcoholic drinks. You are very welcome to bring your own food and drinks but they must be binned and cleaned before you leave.</p>',
            ],
            [
                'question' => 'What are your PC specifications?',
                'answer' => "<p>Specification of our PCs vary from PC to PC. Most of our PCs have Ryzen 5 5600 with Geforce 1660 Ti/Super. 20 of our PCs have Geforce 3060Ti in them (PC 30-PC 49) which will show better performance on certain games.&nbsp;</p><p><br></p><p>ALL PCs have 32' 144hz screens with identical peripherals with 16gb RAM and SSD+HDD.</p><p><br></p><p>With competitive Graphics settings, they are powerful enough to draw high FPS on our screen resolution. We upgrade our PCs or/and furnitures every 12 ~ 18 months to provide optimal experience for customers. Follow our social media pages to peek at how we have been changing every year 😊.</p>",
            ],
            [
                'question' => 'Can I bring in my own peripherals?',
                'answer' => '<p>Yes. You can plug-in anything you bring in from your own keyboards, headsets, mouse, controller and drawing pads.</p>',
            ],
            [
                'question' => 'Do you have controllers that I can use?',
                'answer' => '<p>Yes. We have PS5 DualSense controllers, PS4 DualShock4 controllers or Xbox controllers for hire, provided for free. Please speak to us at the counter to lend one during your stay.</p>',
            ],
            [
                'question' => 'Do you provide game accounts (i.e: Steam, Origin)?',
                'answer' => '<p>No. We have games pre-installed but you are required to use your own gaming platform accounts.</p>',
            ],
            [
                'question' => 'Can you pre-install a game for me?',
                'answer' => '<p>In most cases, we certainly can. Especially if the game you request is on Steam or Epic Launcher as they are the easiest to add!</p>',
            ],
            [
                'question' => 'Do you take bookings or reserve computers?',
                'answer' => '<p>Booking is possible for a group larger than 7 people with the minimum booking time of 2.5 hours ($10 per person). There is also a booking fee of $50. The booking must be made one week prior to the date and prepaid in full 48 hours prior to the booking date.</p><p><br></p><p>Furthermore, the booking does not give free membership account/s and if you decide to leave earlier, the remaining time does not get saved. In a nutshell, booking is more costly than normal walk-ins. Please consider very carefully before committing since the cancellation is not possible and no refunds will be given.</p><p><br></p><p>Contact us if you have any booking inquiries.</p>',
            ],
            [
                'question' => 'What\'s your refund policy?',
                'answer' => '<p>We do not offer refunds if you simply change your mind. However, if you have not used any time purchased on your account, we offer full refunds without any conditions.</p><p><br></p><p>We will provide remedies and compensate with extra time for any time lost due to faulty services (i.e. "my computer shut down during my promos!", sorry dude here\'s an extra hour or two).</p>',
            ],
            [
                'question' => 'What should I do if I run into a problem with a computer?',
                'answer' => '<p>Please let us know! We will likely to be able to resolve the matter a lot quicker. And, we will provide extra time on your account for your trouble!</p>',
            ],
            [
                'question' => 'Do you have on-site car parks?',
                'answer' => '<p>Unfortunately, we do not. However, Uptown (former Myer Centre) across the road offers very competitive rates when you prebook especially after 4pm or on weekends. Please visit their website here.</p>',
            ],
        ]);
    }
}
