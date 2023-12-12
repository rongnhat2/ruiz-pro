<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'secret_key'    => '3745821',
            'email'         => 'admin@gmail.com',
            'password'      => '$2y$10$pmNHwQhyhP.dmPUxVMXzQOtB9IUo3q5NYqJSpaAvGEMI8aK5eyVx6',
            'status'        => '1',
        ]);

        DB::table('brand')->insert(['name' => 'AX Armani Exchange','image' => 'brand/__AX_exchange.svg','description' => 'AX Armani Exchange is the youthful label created in 1991 by iconic Italian designer Giorgio Armani, offering men`s and women`s clothing and accessories that are inspired by the designer`s codes of style. AX Armani Exchange captures the heritage of the Armani brand through a modern sensibility. ','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Casio','image' => 'brand/__CASIO.svg','description' => 'Casio watches hinge on the philosophy of `creativity and contribution` – innovation pulses through each of the brand`s designs. ','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Citizen','image' => 'brand/__Citizen.svg','description' => 'Citizen, a pioneer in watchmaking and innovative technology, promotes excellence and creativity with a deep-rooted respect for craftsmanship. In 1976, Citizen invented Eco-Drive Technology, a simple yet revolutionary concept.','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'MK','image' => 'brand/__MK.svg','description' => 'Michael Kors is a world-renowned, award-winning designer of luxury accessories. Behind this burgeoning empire stands a singular designer with an innate sense of glamour and an unfailing eye for timeless chic. ','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Sekonda','image' => 'brand/__Sekonda1.svg','description' => 'Established in 1966, Sekonda is now the UK’s number one volume-selling watch brand and has been for the last 31 consecutive years.','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Tissot','image' => 'brand/__tissot.svg','description' => 'Paving the way for Swiss watch brands since 1853, Tissot was founded in the Swiss mountains and continues to pioneer craftsmanship with its innovative state of mind.','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'TOMMY','image' => 'brand/__TOMMY1.svg','description' => 'The TOMMY HILFIGER SS23 watches and jewellery assortment includes new collections featuring geometric accents, semi-precious stones, as well as unconventional twists on classic designs. The Men’s watches offer styles in a variety of plating’s for all occasions.','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Armani','image' => 'brand/_E_armani.svg','description' => 'The Emporio Armani collection is infused with an understated sense of confidence, offering up classic watch styles imbued with heritage and enduring design. Emporio Armani is "a line for men and women who lead a modern lifestyle and want to dress with a sense of casual sophistication.','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Fossil','image' => 'brand/_Fossil.svg','description' => 'An American watch and lifestyle company creatively rooted in authentic, vintage and classic design. With each signature watch, leather accessory and other product, Fossil strives to create high-quality designs that preserve the best of the past while updating it for today. ','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Rotary','image' => 'brand/001_Rotary.svg','description' => 'With the singular vision to create timeless watches for the modern world, Rotary is an award-winning watch brand. Proud of its heritage, Rotary is forever inspired by a commitment to watchmaking excellence since its inception in Switzerland in 1895.','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'BOSS','image' => 'brand/BOSS_LOGO_black_RGB3.svg','description' => 'BOSS Watches are immaculately tailored to lifestyles where style navigates and precision counts. Sharp cuts, clean design and quality materials are always on the agenda. ','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Olivia','image' => 'brand/Olivia-Burton-Logo__black-3.svg','description' => 'Olivia Burton was born in 2012, in the heart of London, when two female founders had the vision to create a new, distinctive brand. Ever since then we’ve been creating beautiful watches with a uniquely British twist – more recently we broadened our range to include stunning jewellery. ','status' => '1', ]);
        DB::table('brand')->insert(['name' => 'Swatch','image' => 'brand/Swatch_Logo.svg','description' => 'Swatch, launched in 1983 by Nicolas G. Hayek, is a leading Swiss watch maker and one of the world`s most popular brands. The first Swatch watches surprised everyone with their revolutionary concept, creative design and provocative spirit.','status' => '1', ]);


        DB::table('category')->insert(['name' => 'Mechanical Watches','description' => 'Mechanical movements never require batteries because they require periodical hand-winding to operate. They are accurate to about +/- 20 seconds a day and super reliable and just plain cool to look at. They justify a higher price tag than other movements because they feature intricate series of tiny components that work together to power the timepiece.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Automatic Watches','description' => 'Automatic watches are self-winding with a spring inside, there is no battery and very little maintenance is required for this type of watch. Automatic watches capture the movement of your wrist and use it to power the mechanism so there is no need to wind the watch by hand, or buy batteries. They are accurate to about +/- 20 seconds a day and available for all budgets.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Quartz Watches','description' => 'Quartz watches are a type of watch that runs on an electric current, which comes from a battery in the watch. They require a battery to function & battery replacement every 2-3 years. Quartz watches are one of the most popular types of watch and many people prefer them over mechanical watches. They are one of the most affordable watch movements and are accurate to about +/- 15 seconds a month. ','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Solar Watches','description' => 'Solar Watches are powered by light, which is converted into energy. They use a battery that stores this energy and then powers the watch. There are two types of solar watches: primary and secondary. A primary solar watch converts light into energy and if there"s no light, the watch will stop. A secondary solar movement has a rechargeable re-chargeable battery in addition to the solar cell so that even if its not exposed to light for some time, you can still wear your watch for quite some time without issue. They are accurate to about +/- 15 seconds a month and offer something completely different. ','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Analogue Watches','description' => 'Analogue watches feature a traditional clock face with three-hand movement and are available for every budget. Where digital watches count down the seconds, showing only the exact time, analogue watches show you the time through hands-on a dial usually in increments of five minutes. These hands may also show you the date or day of the week. The standout feature of analogue watches is that they are a representation of the classic and traditional side of timepieces. They are also perfect to wear on dressy occasions. ','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Digital Watches','description' => 'Digital watches feature time in numerical digits and they are often packed with features like a GPS, pedometer and more. They do not contain any moving parts, and instead, rely on an electronic circuit to drive the LEDs or LCDs that show the time. The standout feature of digital watches is that they have an electronic display. The great thing about digital watches is that they are also available in many different price ranges. They are also perfect to wear for sporting activities and workwear. ','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Chronograph Watches','description' => 'Chronograph watches feature a face with subdials. These subdials often feature a tachymeter which is a scale inscribed around the rim of a watch. It is used to measure speed over a known distance. More complications and functions with subdials often include stopwatches, tachymeters and more. They are available in a range of different styles and budgets so anyone can own a chronograph. ','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Hybrid Watches','description' => 'Hybrid watches feature analogue and digital combos. They offer similar functionality to smartwatches because they combine digital features with traditional watch mechanics. They are ideal for sports and fitness and offer a timepiece for every budget. ','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Aviator Watches','description' => 'They are a type of wristwatch that was originally developed for use by pilots. Aviator watches are considered one of the most practical watch designs and offer a number of key characteristics. These include legibility, versatility and durability. Many also feature a water-resistant design as aviators often operate in harsh environments and wet conditions.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Military Watches','description' => 'Military watches are tactical watches that have been specifically designed for people in the military as well as law enforcement agencies. They come with special features that will prove quite useful in the field and for adventures - a compass, waterproofing, a robust strap and more.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Racing Watches','description' => 'A racing watch is a type of watch that is suitable for different types of races, varying from car racing to horse racing. It is famed for its exceptional precision and accuracy in tracking speed and distance. On average, this type of watch features a bigger dial size with larger numerals (Arabic or Roman numerals). It is also equipped with chronograph subdials to display speed and distance. A stylish tachymeter often sits on the outer rim of the dial. The cases are usually made of strong materials such as stainless steel or titanium. While leather straps are preferred for their great durability.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Diving Watches','description' => 'A dive watch is a watch designed to be used for diving and underwater activities. Used by both professional and recreational divers, these watches are normally water-resistant up to depths of at least 100 meters. Diving watches are more than just luxury accessories: they"re crucial tools used by divers to track time when submerged in the water. Check out our Watch Water Resistance Explained guide to learn more about water resistance.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Field Watches','description' => 'Field watches were first introduced to the world in 1942 as rugged, reliable, and easy-to-read wristwatches designed to be worn by soldiers on battlefields. After the war, they continued to be popular with everyone from conductors to sportsmen and more. Today, the style is still popular and has transcended way beyond military use. Field watches are designed with durability and functionality in mind. They are lightweight with a water-resistant case and feature a clear dial to make telling time as easy as possible in nearly any environment.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Fashion Watches','description' => 'Fashion watches are built to look good, not necessarily to keep time with great precision. Some would place fashion watches in the jewellery category. While this group of watches is often less expensive than their luxury counterparts, they can still command a hefty price. Many fashion watches use quartz movements and may have simple or no complications. Designers will often create an entire collection themed around one specific style that includes items like leather handbags, leather belts, scarves, and wallets.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Luxury Watches','description' => 'Luxury watches are a fashion accessory that can tell the time, just like less expensive watches. What sets them apart is their excellent quality of materials and craftsmanship, as well as their often unique design. Luxury watches are often laboriously hand-finished and are based on historical designs that have been in development for hundreds of years. Luxury watches are not made quickly or cheaply; they are stunning pieces of artistry that tell a story.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Smart Watches','description' => 'Smart watches are a type of wearable technology, and they connect to your smartphone via Wi-Fi or Bluetooth. Most smart watches can also track your steps and make phone calls without taking out your smartphone. Some smart watches include fitness features to track the number of steps you take or calories you burn. Wearable fitness trackers can help with sleep tracking, heart rate monitoring and GPS tracking.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Fitness Watches','description' => 'Fitness watches offer users an easy to use device that helps them take care of their well-being. Some fitness watches count steps, while others even go as far as tracking heart rate and heartbeat patterns. Most fitness tracks have water-resistance of 30 - 50 meters; meaning you can wear them in the shower or the pool. Many fitness bands have interchangeable wristbands so you can wear them with your favourite bracelet.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Pocket Watches','description' => 'A pocket watch is a watch that is made to be carried in a pocket, as opposed to a wristwatch, which is strapped to the wrist. They were the most common type of watch from their development in the 16th century until wristwatches became popular after World War I. By the end of the 20th-century, pocket watches were largely superseded by wristwatches, though they are nonetheless still produced and sold today.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Nurses Watches','description' => 'Nurses watches are a type of watch that has been developed for medical professionals in clinical environments. They let nurses track time without having to constantly look at their smartphones. Thats particularly important during the critical moments of treatment, when not a second can be wasted. Nurse`s watches are also often waterproof or water-resistant so that they can be worn while washing hands continuously (and disinfecting) throughout their day','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Sport Watches','description' => 'Sport watches are watches manufactured for the sole purpose of being used when doing sports. They can have a variety of different features depending on the sport, such as being waterproof for those who would like to swim with one. They track heart rate, activity, and sleep, monitor our pace and distance with GPS, give us audio prompts during workouts and races, and so much more. By providing real-time stats and coaching on our wrist, sports watches help us achieve optimal workout performance.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Wood Watches','description' => 'A wood watch is any watch that is made of wood, whether its the band or the casing. They are made from 100% real wood and designed to be comfortable, durable, and environmentally friendly. If your watch has anything to do with wood, its a wood watch. Wood can be used in its natural form or can be combined with other materials like bamboo and copper.','status' => '1', ]);
        DB::table('category')->insert(['name' => 'Dress Watches','description' => 'Dress watches are a type of watch that are made to be worn with formal wear, especially for business and other "dress-up" occasions. While basic as a definition, a wide variety of materials and styles can be used in this type of timepiece and lead to many different interpretations. For some, a simple gold or silver watch is enough to be considered dressy but for others, one must have diamonds, multiple complications and expensive materials such as platinum. In any case, dress watches are intended to be elegant timepieces that fit fashionably with formal attire.','status' => '1', ]);


        DB::table('color')->insert(['name' => 'Black','hex' => '#000000','status' => '1', ]);
        DB::table('color')->insert(['name' => 'Red','hex' => '#ff0000','status' => '1', ]);
        DB::table('color')->insert(['name' => 'Blue','hex' => '#0000FF','status' => '1', ]);
    }
}