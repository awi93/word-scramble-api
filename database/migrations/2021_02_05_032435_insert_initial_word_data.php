<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertInitialWordData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement("
            INSERT INTO public.words (id,word,created_at,updated_at,created_by,updated_by,is_deleted) VALUES
                 ('e3031bb9-d267-4b62-8b20-7677200c12a5','ABRASION',NULL,NULL,NULL,NULL,false),
                 ('b0b3c498-68c2-4f4e-9495-46630731fc80','FRESH',NULL,NULL,NULL,NULL,false),
                 ('ad3e551d-eda6-481b-8788-ea189e25dac5','CALENDAR',NULL,NULL,NULL,NULL,false),
                 ('1e51935a-54fe-4aea-a128-672d20a62f40','MASK',NULL,NULL,NULL,NULL,false),
                 ('b7bf3d89-d13f-4ecf-8c20-8ba875c06f47','MONDAY',NULL,NULL,NULL,NULL,false),
                 ('7c38447f-a6a5-4d58-bea5-5f1b24606e7b','TUESDAY',NULL,NULL,NULL,NULL,false),
                 ('9fa2a537-c784-471a-bc02-a6f1565d0ebf','CAKE',NULL,NULL,NULL,NULL,false),
                 ('0d1e891e-a769-4be1-8c42-0da973e294f3','DRINK',NULL,NULL,NULL,NULL,false),
                 ('2d7a6140-2413-48d9-a647-b57d3ec01ef9','GINGER',NULL,NULL,NULL,NULL,false),
                 ('4e294822-34ac-48ad-b300-bb23394bbe2f','VIDEO',NULL,NULL,NULL,NULL,false),
                 ('aea3adf2-8a27-4f5c-8a7a-1f726b906f38','ICE',NULL,NULL,NULL,NULL,false),
                 ('9d31a004-6933-4803-b978-f09e8f73e709','HELM',NULL,NULL,NULL,NULL,false),
                 ('f1fd4a0e-c8f4-48a1-8476-28a9634c967d','LIGHT',NULL,NULL,NULL,NULL,false),
                 ('f971bc9a-dc40-48e2-82f7-b082152e5539','LAMP',NULL,NULL,NULL,NULL,false),
                 ('ad269efc-bd69-45c6-8854-af322934123a','GLOVES',NULL,NULL,NULL,NULL,false),
                 ('5009fb2e-e88e-45e2-9295-68bd106e2ac8','MOUSE',NULL,NULL,NULL,NULL,false),
                 ('2a04744d-f46f-4449-ad9a-264809d3175c','TEST',NULL,NULL,NULL,NULL,false),
                 ('216c565f-b640-45f2-8631-89e75ee3b2d8','RAPID',NULL,NULL,NULL,NULL,false),
                 ('c60455bc-f581-4de4-83bf-4351924e8cb5','CUPBOARD',NULL,NULL,NULL,NULL,false),
                 ('150cada1-4643-4bb1-8528-f84ffe543579','UMBRELLA',NULL,NULL,NULL,NULL,false),
                 ('cd8c176a-df73-41ed-b6d9-60ab21987783','BAG',NULL,NULL,NULL,NULL,false),
                 ('bfd31710-3518-422d-8a83-229aba879b67','BACKPACK',NULL,NULL,NULL,NULL,false),
                 ('c6740e49-22ca-4419-a11d-f7ac60769a18','BOTTLE',NULL,NULL,NULL,NULL,false),
                 ('236ce059-13f8-400e-b6a2-376eb28f15f7','MUG',NULL,NULL,NULL,NULL,false),
                 ('fc8f92d2-8d56-45a9-a095-0630339e5358','JUG',NULL,NULL,NULL,NULL,false),
                 ('7d247f60-30c8-41e6-a5ea-118fb9accc87','SHOES',NULL,NULL,NULL,NULL,false),
                 ('63d488dc-441b-4f7e-82cc-dcbc0105d32b','TABLE',NULL,NULL,NULL,NULL,false),
                 ('97c01df6-d650-4087-90f2-d912020d67df','CHAIR',NULL,NULL,NULL,NULL,false),
                 ('eeb1c89b-83b3-4abf-b09c-4445b081673e','TELEPHONE',NULL,NULL,NULL,NULL,false),
                 ('3830a934-796f-4aea-b677-7b7e494a3d0c','EARPHONE',NULL,NULL,NULL,NULL,false),
                 ('b6110b0d-38ed-4e91-ba55-832eaaba5990','JACKET',NULL,NULL,NULL,NULL,false),
                 ('7804ec6f-f988-47cf-a575-e0c08e639988','TENT',NULL,NULL,NULL,NULL,false),
                 ('ccce6767-ed26-4ae6-b196-66510261fb07','DRAWER',NULL,NULL,NULL,NULL,false),
                 ('fb186c98-ff10-4768-a129-cf91f6c55ed1','BENCH',NULL,NULL,NULL,NULL,false),
                 ('98d2c73e-59df-48db-93b3-10ae5446d0c1','WHITEBOARD',NULL,NULL,NULL,NULL,false),
                 ('7031e325-3786-4eb9-988d-a74dfea07836','PHONE',NULL,NULL,NULL,NULL,false),
                 ('bce6e4b6-51bd-4e5b-bad6-bde2767441cf','WALLET',NULL,NULL,NULL,NULL,false),
                 ('b9d676b9-e1bf-4930-bf73-b9e89e9c4617','WATCH',NULL,NULL,NULL,NULL,false),
                 ('66ffd591-a3b1-4898-8a1f-850e1dc11ebe','WALL',NULL,NULL,NULL,NULL,false),
                 ('29c2530d-5141-408a-8179-8be8a5806f6e','WINDOW',NULL,NULL,NULL,NULL,false),
                 ('44a56d7d-90e9-46ce-907b-bdde44238a2f','MEDICINE',NULL,NULL,NULL,NULL,false),
                 ('7f125e38-dda7-43a1-889f-9e51c4357da9','DOOR',NULL,NULL,NULL,NULL,false),
                 ('3ab6420d-8d83-4b55-86ee-596f107218df','GLASS',NULL,NULL,NULL,NULL,false),
                 ('df751e69-4162-434e-9953-3738dbfde322','PLASTIC',NULL,NULL,NULL,NULL,false),
                 ('7d49b280-d3f2-432e-a19b-70e3b0cf9065','BOX',NULL,NULL,NULL,NULL,false),
                 ('1ca63a76-a06f-4a87-9bb7-94b12807acff','SOCK',NULL,NULL,NULL,NULL,false),
                 ('9b10cd04-87c8-4e67-9466-eaf08f2c9229','FAN',NULL,NULL,NULL,NULL,false),
                 ('c9325359-1bd8-446c-88a3-fd6a8fe70504','BUCKET',NULL,NULL,NULL,NULL,false),
                 ('eaf63cf9-1c2b-48b6-a759-383d769f7a4f','CABLE',NULL,NULL,NULL,NULL,false),
                 ('590d52ba-7ae9-4073-a789-f27f1a698a59','HAND',NULL,NULL,NULL,NULL,false);
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement("
            DELETE FROM public.words
            WHERE id='e3031bb9-d267-4b62-8b20-7677200c12a5';
            DELETE FROM public.words
            WHERE id='b0b3c498-68c2-4f4e-9495-46630731fc80';
            DELETE FROM public.words
            WHERE id='ad3e551d-eda6-481b-8788-ea189e25dac5';
            DELETE FROM public.words
            WHERE id='1e51935a-54fe-4aea-a128-672d20a62f40';
            DELETE FROM public.words
            WHERE id='b7bf3d89-d13f-4ecf-8c20-8ba875c06f47';
            DELETE FROM public.words
            WHERE id='7c38447f-a6a5-4d58-bea5-5f1b24606e7b';
            DELETE FROM public.words
            WHERE id='9fa2a537-c784-471a-bc02-a6f1565d0ebf';
            DELETE FROM public.words
            WHERE id='0d1e891e-a769-4be1-8c42-0da973e294f3';
            DELETE FROM public.words
            WHERE id='2d7a6140-2413-48d9-a647-b57d3ec01ef9';
            DELETE FROM public.words
            WHERE id='4e294822-34ac-48ad-b300-bb23394bbe2f';
            DELETE FROM public.words
            WHERE id='aea3adf2-8a27-4f5c-8a7a-1f726b906f38';
            DELETE FROM public.words
            WHERE id='9d31a004-6933-4803-b978-f09e8f73e709';
            DELETE FROM public.words
            WHERE id='f1fd4a0e-c8f4-48a1-8476-28a9634c967d';
            DELETE FROM public.words
            WHERE id='f971bc9a-dc40-48e2-82f7-b082152e5539';
            DELETE FROM public.words
            WHERE id='ad269efc-bd69-45c6-8854-af322934123a';
            DELETE FROM public.words
            WHERE id='5009fb2e-e88e-45e2-9295-68bd106e2ac8';
            DELETE FROM public.words
            WHERE id='2a04744d-f46f-4449-ad9a-264809d3175c';
            DELETE FROM public.words
            WHERE id='216c565f-b640-45f2-8631-89e75ee3b2d8';
            DELETE FROM public.words
            WHERE id='c60455bc-f581-4de4-83bf-4351924e8cb5';
            DELETE FROM public.words
            WHERE id='150cada1-4643-4bb1-8528-f84ffe543579';
            DELETE FROM public.words
            WHERE id='cd8c176a-df73-41ed-b6d9-60ab21987783';
            DELETE FROM public.words
            WHERE id='bfd31710-3518-422d-8a83-229aba879b67';
            DELETE FROM public.words
            WHERE id='c6740e49-22ca-4419-a11d-f7ac60769a18';
            DELETE FROM public.words
            WHERE id='236ce059-13f8-400e-b6a2-376eb28f15f7';
            DELETE FROM public.words
            WHERE id='fc8f92d2-8d56-45a9-a095-0630339e5358';
            DELETE FROM public.words
            WHERE id='7d247f60-30c8-41e6-a5ea-118fb9accc87';
            DELETE FROM public.words
            WHERE id='63d488dc-441b-4f7e-82cc-dcbc0105d32b';
            DELETE FROM public.words
            WHERE id='97c01df6-d650-4087-90f2-d912020d67df';
            DELETE FROM public.words
            WHERE id='eeb1c89b-83b3-4abf-b09c-4445b081673e';
            DELETE FROM public.words
            WHERE id='3830a934-796f-4aea-b677-7b7e494a3d0c';
            DELETE FROM public.words
            WHERE id='b6110b0d-38ed-4e91-ba55-832eaaba5990';
            DELETE FROM public.words
            WHERE id='7804ec6f-f988-47cf-a575-e0c08e639988';
            DELETE FROM public.words
            WHERE id='ccce6767-ed26-4ae6-b196-66510261fb07';
            DELETE FROM public.words
            WHERE id='fb186c98-ff10-4768-a129-cf91f6c55ed1';
            DELETE FROM public.words
            WHERE id='98d2c73e-59df-48db-93b3-10ae5446d0c1';
            DELETE FROM public.words
            WHERE id='7031e325-3786-4eb9-988d-a74dfea07836';
            DELETE FROM public.words
            WHERE id='bce6e4b6-51bd-4e5b-bad6-bde2767441cf';
            DELETE FROM public.words
            WHERE id='b9d676b9-e1bf-4930-bf73-b9e89e9c4617';
            DELETE FROM public.words
            WHERE id='66ffd591-a3b1-4898-8a1f-850e1dc11ebe';
            DELETE FROM public.words
            WHERE id='29c2530d-5141-408a-8179-8be8a5806f6e';
            DELETE FROM public.words
            WHERE id='44a56d7d-90e9-46ce-907b-bdde44238a2f';
            DELETE FROM public.words
            WHERE id='7f125e38-dda7-43a1-889f-9e51c4357da9';
            DELETE FROM public.words
            WHERE id='3ab6420d-8d83-4b55-86ee-596f107218df';
            DELETE FROM public.words
            WHERE id='df751e69-4162-434e-9953-3738dbfde322';
            DELETE FROM public.words
            WHERE id='7d49b280-d3f2-432e-a19b-70e3b0cf9065';
            DELETE FROM public.words
            WHERE id='1ca63a76-a06f-4a87-9bb7-94b12807acff';
            DELETE FROM public.words
            WHERE id='9b10cd04-87c8-4e67-9466-eaf08f2c9229';
            DELETE FROM public.words
            WHERE id='c9325359-1bd8-446c-88a3-fd6a8fe70504';
            DELETE FROM public.words
            WHERE id='eaf63cf9-1c2b-48b6-a759-383d769f7a4f';
            DELETE FROM public.words
            WHERE id='590d52ba-7ae9-4073-a789-f27f1a698a59';
        ");
    }
}
