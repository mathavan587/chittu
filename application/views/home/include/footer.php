  <!-- Footer -->
  <?php 
         $apimodel = new Apimodel();
          $apimodel->tablename = 'settings';
          $condition=array('categories'=>'instagram');
          $link = $apimodel->getSingleData($condition,$select);
          $instagram = $link->link;
              $condition=array('categories'=>'instagram');
          $link = $apimodel->getSingleData($condition,$select);
          $instagram = $link->link;
              $condition=array('categories'=>'facebook');
          $link = $apimodel->getSingleData($condition,$select);
          $facebook = $link->link;

           $condition=array('categories'=>'threads');
          $link = $apimodel->getSingleData($condition,$select);
          $threads = $link->file_name;
          $threads_link = $link->link;

          
           $condition=array('categories'=>'threads');
          $link = $apimodel->getSingleData($condition,$select);
          $threads = $link->file_name;
          $threads_link = $link->link;
           $condition=array('categories'=>'linkedin');
          $link = $apimodel->getSingleData($condition,$select);
          // $linkedin = $link->file_name;
          $linkedin = $link->link;

          $condition=array('categories'=>'whatsapp');
          $link = $apimodel->getSingleData($condition,$select);
          $whatsapp = $link->file_name;
          $whatsapp_link = $link->link;

           $condition=array('categories'=>'email');
          $link = $apimodel->getSingleData($condition,$select);
          // $whatsapp = $link->file_name;
          $email = $link->link;
            $condition=array('categories'=>'phone');
          $link = $apimodel->getSingleData($condition,$select);
          // $whatsapp = $link->file_name;
          $phone = $link->link;
               $condition=array('categories'=>'address');
          $link = $apimodel->getSingleData($condition,$select);
          // $whatsapp = $link->file_name;
          $address = $link->link;

 ?>
  <footer class="bg-gray-800 text-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-7xl">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <div class="text-2xl font-bold mb-4">
            <span class="italic">Chittu</span> <span class="text-gray-300">SMM Panel</span>
          </div>
          <p class="text-gray-400 mb-4">The best solution for all your social media marketing needs.</p>
          <div class="flex space-x-4">
            <a href="<?=$facebook?>" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
            <!-- <a href="<?=$twitter?>" class="text-gray-400 hover:text-white"><i class="uil uil-at"></i></a>  -->
             <a href="<?=$threads_link?>" class="text-gray-400 hover:text-white inline-block w-6 h-6">
    <img src="<?=base_url('uploads/'.$threads)?>" 
         alt="Threads" 
         class="w-full h-full object-contain">
</a>

             <a href="<?=$whatsapp_link?>" class="text-gray-400 hover:text-white inline-block w-6 h-6">
    <img src="<?=base_url('uploads/'.$whatsapp)?>" 
         alt="whatsapp" 
         class="w-full h-full object-contain">
</a>

            <a href="<?=$instagram?>" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
            <a href="<?=$linkedin?>" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
            <li><a href="#services" class="text-gray-400 hover:text-white">Services</a></li>
            <li><a href="#pricing" class="text-gray-400 hover:text-white">Pricing</a></li>
            <li><a href="#faq" class="text-gray-400 hover:text-white">FAQs</a></li>
            <li><a href="#api" class="text-gray-400 hover:text-white">API Documentation</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4">Services</h3>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white">Instagram Services</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">YouTube Services</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">TikTok Services</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Facebook Services</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white">Twitter Services</a></li>
          </ul>
        </div>
        
        <div>
          <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
          <ul class="space-y-2">
            <li class="flex items-start">
              <i class="fas fa-envelope text-indigo-400 mt-1 mr-3"></i>
              <span class="text-gray-400"><?=$email?></span>
            </li>
            <li class="flex items-start">
              <i class="fas fa-phone-alt text-indigo-400 mt-1 mr-3"></i>
              <span class="text-gray-400"><?=$phone?></span>
            </li>
            <li class="flex items-start">
              <i class="fas fa-map-marker-alt text-indigo-400 mt-1 mr-3"></i>
              <span class="text-gray-400"><?=$address?></span>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="mt-12 pt-8 border-t border-gray-700 text-center text-gray-400 text-sm">
        <p>&copy; 2025 Chittu SMM Panel. All rights reserved.</p>
      </div>
    </div>
  </footer>