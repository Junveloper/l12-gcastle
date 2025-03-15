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
                'question' => 'Where are you located?',
                'answer' => "<p>We're a bit of a hidden gem and don't have a distinctive street sign. Look for the \"comics etc.\" sign on 81 Elizabeth Street. We are in the basement of the same building!</p>",
            ],
            [
                'question' => 'How much does membership cost?',
                'answer' => "<p>Membership is free. However, you are required to top up a minimum of $10 (3 hours) to activate membership. You will also need a photo ID (i.e. student card, driver's license, passport) and a phone number that can be verified by us.</p>",
            ],
            [
                'question' => 'When does my membership expire?',
                'answer' => '<p>Your membership only expires after 2 years of inactivity.</p>',
            ],
            [
                'question' => 'Does remaining time stay on my account?',
                'answer' => '<p>Yes. Regular top ups stay on your account for 365 days from the date of a purchase. The only exception is our 9 hour non-stop night special, which is available to start between 10pm - 2am, and must be used within a single session.</p>',
            ],
            [
                'question' => 'Do you have any terms and conditions?',
                'answer' => '<p>You agree to the following terms and conditions by utilising our services;</p><ul><li>Transfer of the membership or time is not possible.</li><li>Account sharing is not permitted.</li><li>The membership expires after 2 years of inactivity.</li><li>You are responsible for logging out after each session.</li><li>No vaping or smoking inside of the premise.</li><li>No offensive, illegal or sexual contents are to be watched at the premise.</li><li>Behaviours that are rude and offensive towards the staff members and other patrons will not be tolerated.</li><li>No alcoholic beverage is to be consumed inside of the premise.</li><li>Outside food and drinks are to be binned and cleaned.</li><li>The management has sole discretion to either issue a warning or suspend your account for any breaches.</li></ul><p>We would also be very appreciative of good hygiene practices from our customers! And, may unfortunately refuse to serve you in extreme cases.</p>',
            ],
            [
                'question' => 'What payment methods do you have available?',
                'answer' => '<p>We accept cash and have an EFTPOS facility that accepts usual debit/credit/Apple Pay/Google Pay etc. Please note that surcharges may apply on card transactions.</p>',
            ],
            [
                'question' => 'Do you sell food or drinks?',
                'answer' => '<p>We sell a range of snacks (i.e: chips and chocolates) and non-alcoholic drinks. You are very welcome to bring your own food and drinks but they must be binned and cleaned before you leave.</p>',
            ],
            [
                'question' => 'What are your PC specifications?',
                'answer' => "<p>Specification of our PCs vary from PC to PC. Most of our PCs have Ryzen 5 5600 with Geforce 1660 Ti/Super. 20 of our PCs have Geforce 3060Ti in them (PC 30-PC 49) which will show better performance on certain games. ALL PCs have 32' 144hz screens with identifal peripherals (Logitech G402, ABKO K660 mechanical keyboards, Virgo M60) with 16gb RAM and SSD+HDD.</p><p>With competitive Graphics settings, they are powerful enough to draw high FPS on our screen resolution. We upgrade our PCs or/and furnitures every 12 ~ 18 months to provide optimal experience for customers. Follow our social media pages to peek at how we have been changing every year 😊.</p>",
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
                'answer' => '<p>Booking is possible for a group larger than 7 people with the minimum booking time of 3 hours ($10 per person). There is also a booking fee of $50. The booking must be made one week prior to the date and prepaid in full 48 hours prior to the booking date.</p><p>Furthermore, the booking does not give free membership account/s and if you decide to leave earlier, the remaining time does not get saved. In a nutshell, booking is more costly than normal walk-ins. Please consider very carefully before committing since the cancellation is not possible and no refunds will be given.</p><p>Contact us if you have any booking inquiries.</p>',
            ],
            [
                'question' => 'Do you have printing/scanning available?',
                'answer' => '<p>Yes. Printing is 30c per side and scanning is $1 per side.</p>',
            ],
            [
                'question' => 'Can I just use your printer or scanner without paying to use your PC?',
                'answer' => '<p>No. Printing and scanning are only available to users who are logged into the computer.</p>',
            ],
            [
                'question' => 'Do you do 30 or 15 minutes session?',
                'answer' => '<p>No. Our minimum rate for non-members is $5 for one hour. However, if you are a member - you can simply use the remaining time on your account as you require. If you plan to do multiple short sessions, consider creating a membership.</p>',
            ],
            [
                'question' => 'What\'s your refund policy?',
                'answer' => '<p>We do not offer refunds if you simply change your mind. However, if you have not used any time purchased on your account, we offer full refunds without any conditions.</p><p>We will provide remedies and compensate with extra time for any time lost due to faulty services (i.e. "my computer shut down during my promos!", sorry dude here\'s an extra hour or two).</p>',
            ],
            [
                'question' => 'What should I do if I run into a problem with a computer? (i.e. the game says it will take 40 minutes to patch)',
                'answer' => '<p>Please let us know! We will likely to be able to resolve the matter a lot quicker. And, we will provide extra time on your account for your trouble!</p>',
            ],
            [
                'question' => 'Do you have on-site car parks?',
                'answer' => '<p>Unfortunately, we do not. However, Uptown (former Myer Centre) across the road offers very competitive rates when you prebook especially after 4pm or on weekends. Please visit their website here.</p>',
            ],
            [
                'question' => 'What are your COVID-19 prevention measures?',
                'answer' => '<p>We clean each station thoroughly from keyboards, mouses to headsets after each usage using hospital grade disinfectant. There are bottles of hand sanitiser at the counter for your use.</p><p>We strictly adhere to the directives from QLD Health to ensure that the community is safer from COVID-19.</p>',
            ],
        ]);
    }
}
