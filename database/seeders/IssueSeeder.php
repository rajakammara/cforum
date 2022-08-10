<?php

namespace Database\Seeders;

use App\Models\Issue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('issues')->delete();

        $issues = [
            // Agriculture
            ['id' => 1, 'dept_id' => 1, 'issue_details' => 'There are no reasonable price for the Agrl.input Product', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 2, 'dept_id' => 1, 'issue_details' => 'Spurious / bad quality of Agricultural inputs', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 3, 'dept_id' => 1, 'issue_details' => 'Suitable medicines and seeds not received by farmers', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            // Education
            ['id' => 4, 'dept_id' => 6, 'issue_details' => 'Not Displaying  Fee Structure', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 5, 'dept_id' => 6, 'issue_details' => 'Collection of More Fees / Charging High Fees', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 6, 'dept_id' => 6, 'issue_details' => 'Collection of Donations', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            ['id' => 7, 'dept_id' => 6, 'issue_details' => 'Pressuring to Pay entire fee at a time', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),],
            [
                'id' => 8, 'dept_id' => 6, 'issue_details' => 'Improper Teaching', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 9, 'dept_id' => 6, 'issue_details' => 'Not Issuing Transfer certificate and other certificates to students', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 10, 'dept_id' => 6, 'issue_details' => 'Teaching with un-qualified teachers / No quality of teaching', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 11, 'dept_id' => 6, 'issue_details' => 'School is running during the government proposed vacation period', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 12, 'dept_id' => 6, 'issue_details' => 'Providing Toilets / Separate toilet facility for Girls and Boys & its maintenance', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 13, 'dept_id' => 6, 'issue_details' => 'Providing essential Library / Labs / Dining Hall & its maintenance', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 14, 'dept_id' => 6, 'issue_details' => 'Due to more number of books children are not able to carry', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 15, 'dept_id' => 6, 'issue_details' => 'Lack of supply of good quality food in Govt residential school', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 16, 'dept_id' => 6, 'issue_details' => 'Lack of Fortified / nutrified food', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 17, 'dept_id' => 6, 'issue_details' => 'Providing Drinking water', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],

            // Health
            [
                'id' => 18, 'dept_id' => 8, 'issue_details' => 'Lack of Display of medicines price list infront of Medical shops', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 19, 'dept_id' => 8, 'issue_details' => 'Selling for higher rates at medical shops', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 20, 'dept_id' => 8, 'issue_details' => 'Boards relating to PCPNDT are not displayed near scaning centers', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 21, 'dept_id' => 8, 'issue_details' => 'In Govt. hospitals Doctors are giving prescriptions duly refering to purchase medicines from outside', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 22, 'dept_id' => 8, 'issue_details' => 'Providing qualified Doctors / Nurses / staff etc.,', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 23, 'dept_id' => 8, 'issue_details' => 'Collecting more fees / charge High fees by Private Doctors / Private hospitals', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 24, 'dept_id' => 8, 'issue_details' => 'Display fee structure for each service / tests', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 25, 'dept_id' => 8, 'issue_details' => 'Expiring medicines are strictly prohibited', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 26, 'dept_id' => 8, 'issue_details' => 'Providing Ambulance', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],

            // Drug Inspector
            [
                'id' => 27, 'dept_id' => 5, 'issue_details' => 'Allopathic medicines from standard companies to be maintained', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 28, 'dept_id' => 5, 'issue_details' => 'Selling of the inaccurate and expired medicine', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 29, 'dept_id' => 5, 'issue_details' => 'Must have Drug Licenses', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 30, 'dept_id' => 5, 'issue_details' => 'Illegal Practice / Misbehavior', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Weight and Measurements
            [
                'id' => 31, 'dept_id' => 12, 'issue_details' => 'Differences in measurments are not identified', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 32, 'dept_id' => 12, 'issue_details' => 'Responsible to ensure weights and measures standards', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 33, 'dept_id' => 12, 'issue_details' => 'Maintaining uniformity and accuracy in all weights and measures, weighing and measuring Instruments used by traders in all hats, markets and trading centers', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 34, 'dept_id' => 12, 'issue_details' => 'Dispensing unit, weigh bridge verification certificate is issued to the user which is required to be displayed at conspicuous place by the trader/user', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 35, 'dept_id' => 12, 'issue_details' => 'Every Weights & Measures used by the dealer is stamped by the Weights & Measures Department after due verification, with a special seal indicating the identification of Legal Metrology Officer(LMO) and quarter in which it is verified', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 36, 'dept_id' => 12, 'issue_details' => 'Issue of Verification Certificate and the Certificate should be prominently displayed at the place of use', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            // ICDS
            [
                'id' => 37, 'dept_id' => 10, 'issue_details' => 'Lack of supply of nutrifed food to the children', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 38, 'dept_id' => 10, 'issue_details' => 'Childrens with deficiancy of nutrified food not recognized', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 39, 'dept_id' => 10, 'issue_details' => 'Lack of conduct of immunization program regularly', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            // DRDA
            [
                'id' => 40, 'dept_id' => 4, 'issue_details' => 'Loans not received by members of SHG groups', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Horticulture
            [
                'id' => 41, 'dept_id' => 4, 'issue_details' => 'Plants / Drips and irrigation in implimentation not maintained properly', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Animal Husbandary
            [
                'id' => 42, 'dept_id' => 2, 'issue_details' => 'Cattle insurance not provided', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 43, 'dept_id' => 2, 'issue_details' => 'Lack of awareness on fodder supply schemes', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 44, 'dept_id' => 2, 'issue_details' => 'High price of Fodder in Private shops', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 45, 'dept_id' => 2, 'issue_details' => 'Poor / bad quality of Foder', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],

            // District Supply Office
            [
                'id' => 46, 'dept_id' => 3, 'issue_details' => 'To ensure availability of Card / Digital Payment', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 47, 'dept_id' => 3, 'issue_details' => 'Petrol Bunk - Card Machine Not Working', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 48, 'dept_id' => 3, 'issue_details' => 'Petrol Bunk - Air facility Not available / Displayed facility not working', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 49, 'dept_id' => 3, 'issue_details' => 'Petrol Bunk - Poor Lighting, Clean Toilet, Toilet Not provided /Toilets Locked', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 50, 'dept_id' => 3, 'issue_details' => 'Petrol Bunk - To display Fuel Price list', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 51, 'dept_id' => 3, 'issue_details' => 'Petrol Bunk - First aid box Not available', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 52, 'dept_id' => 3, 'issue_details' => 'Petrol Bunk - Short Delivery In Diesel / Petrol', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 53, 'dept_id' => 3, 'issue_details' => 'Gas Agency - Delays in delivery of LPG cylinders', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 54, 'dept_id' => 3, 'issue_details' => 'Gas Agency - Delays or denial in booking LPG cylinders', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 55, 'dept_id' => 3, 'issue_details' => 'Gas Agency - Non-delivery of cylinders booked through IVRS', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 56, 'dept_id' => 3, 'issue_details' => 'Gas Agency - Distributor asking for extra charges in delivering cylinders', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 57, 'dept_id' => 3, 'issue_details' => 'Gas Agency - Distributor denying delivery of cylinder to the address of the consumer', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 58, 'dept_id' => 3, 'issue_details' => 'Gas Agency - Underweight cylinders being delivered by Agency', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Commercial taxes
            [
                'id' => 59, 'dept_id' => 11, 'issue_details' => 'High service-charge in Restaurants', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 60, 'dept_id' => 11, 'issue_details' => 'More than MRP sale at Private shops', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 61, 'dept_id' => 11, 'issue_details' => 'No bills being given at private shop', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],

            // Health
            [
                'id' => 62, 'dept_id' => 5, 'issue_details' => 'Maintenance of medical shop with qualified staff and rates must be reasonable with bills', 'priority' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];


        foreach ($issues as $issue) {
            Issue::create($issue);
        }
    }
}
