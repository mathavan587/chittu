<!-- Add this to the <head> for counter animation -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll(".counter");
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute("data-target");
        const speed = 200;
        const count = +counter.innerText.replace(/\D/g, '');
        const inc = Math.ceil(target / speed);

        if (count < target) {
        //   counter.innerText = count + inc + "+";
          counter.innerText = count + inc;
          setTimeout(updateCount, 20);
        } else {
        //   counter.innerText = target.toLocaleString() + "+";
          counter.innerText = target.toLocaleString() ;
        }
      };
      updateCount();
    });
  });
</script>

<!-- Cards Section -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 p-6 bg-white-500 text-white">
  <!-- Card 1 -->
  <div class="bg-green-600 rounded-2xl p-6 text-center shadow-lg">
    <p class="text-sm mb-2">Total User</p>
    <h2 class="text-3xl font-bold counter" data-target="<?=$user_count?>">0</h2>
  </div>

  <!-- Card 2 -->
  <div class="bg-green-600 rounded-2xl p-6 text-center shadow-lg">
    <p class="text-sm mb-2">Total Orders</p>
    <h2 class="text-3xl font-bold counter" data-target="<?=$orders_count?>">0</h2>
  </div>

  <!-- Card 3 -->
  <div class="bg-green-600 rounded-2xl p-6 text-center shadow-lg">
    <p class="text-sm mb-2">Total Services</p>
    <h2 class="text-3xl font-bold counter" data-target="<?=$services_count?>">0</h2>
  </div>


  <!-- Card 4 -->
  <div class="bg-green-600 rounded-2xl p-6 text-center shadow-lg">
    <p class="text-sm mb-2">Total Categories</p>
    <h2 class="text-3xl font-bold counter" data-target="<?=$categories_count?>">0</h2>
  </div>

  <!-- Card 4 -->
    <!-- <div class="bg-green-600 rounded-2xl p-6 text-center shadow-lg">
        <p class="text-sm mb-2">On Theme Market</p>
        <h2 class="text-3xl font-bold">11 Years</h2>
    </div> -->
</div>
