<?php

/**
 * 
 *  Description: ქართული გვარების ბრუნვა (მოთხრობითი, მიცემითი და ნათესაობითი)
 *  File: GeoLastname.php
 *  Author: Kakhaber Mekvabishvili
 * 
 */

Class GeoLastname
{
    
    /**
     * @var string
     */
    private string $lastname;
    private string $output;

    /**
     * ბრუნვები
     * 
     * MO - მოთხრობითი (მა) (მაგ: მექვაბიშვილმა, კეჟერაძემ, ჭყონიამ)
     * MI - მიცემითი (ს) (მაგ: მექვაბიშვილს, კეჟერაძეს, ჭყონიას)
     * NA - ნათესაობითი (ის) (მაგ: მექვაბიშვილის, კეჟერაძის, ჭყონიას)
     * 
     * @var array
     */
    const CASES = ['MO','MI','NA'];

    /**
     * 
     * @param string $lastname
     */
    public function __construct(string $lastname)
    {

        $this->lastname = $lastname;
    }

    /**
     * ბრუნვის პარამეტრის შემოწმება
     * 
     * @return void
     * @throws InvalidArgumentException  if the case is not supported.
     */
    public function validateCase(string $case)
    {
        if(!in_array($case, self::CASES)) 
        {
            throw new InvalidArgumentException ('Case [' . $case . '] not supported!');
        }
    }

    /**
     * გვარის გარდაქმნა მოთხრობით, მიცემით ან ნათესაობით ბრუნვაში
     * 
     * @param string $case
     * @return string 
     */
    public function transform(string $case)
    {
        // შემოწმება
        $this->validateCase($case);

        $lastname = mb_substr($this->lastname,0,mb_strlen(trim($this->lastname))-1);

        // ბოლო სიმბოლო
        $lastSym = mb_substr($this->lastname,mb_strlen(trim($this->lastname))-1,1);

        switch($case) {
            
            // მოთხრობითი(მა) - Narrative case ***
            case 'MO':

                if($lastSym == 'ი'){ // თუ მთავრდება 'ი' ასოზე მაგ: მექვაბიშვილი

                    $this->output = $lastname.'მა'; // მექვაბიშვილმა

                }else{ // თუ მთავრდება 'ე' ან 'ა' მაგ: კეჟერაძე ან ხუჭუა

                    $this->output = $this->lastname.'მ'; // კეჟერაძემ ან ხუჭუამ

                }
                break;

            // მიცემითი(ს) - Dative case ***
            case 'MI':

                if($lastSym == 'ი'){

                    $this->output = $lastname.'ს'; // მექვაბიშვილს

                }else{
                    
                    $this->output = $this->lastname.'ს'; // კეჟერაძეს ან ხუჭუას

                }
                break;

            // ნათესაობითი(ის) - Genitive case ***
            case 'NA':

                if($lastSym == 'ი'){

                    // წერეთელი და მაჩაბელი იკვეცება (მაგ: წერეთლის, მაჩაბლის)
                    if($this->lastname == 'წერეთელი'){

                        $this->output = 'წერეთლის';

                    }else if($this->lastname == 'მაჩაბელი'){

                        $this->output = 'მაჩაბლის';

                    }else{

                        $this->output = $this->lastname.'ს';

                    }

                }else if($lastSym == 'ე'){

                    $this->output = $lastname.'ის';

                }else{

                    $this->output = $this->lastname.'ს';

                }
                break;
            
        }

        return $this->output;
    }
}