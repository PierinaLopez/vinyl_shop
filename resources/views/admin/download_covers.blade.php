<x-vinylshop-layout>
    <x-slot name="description">Download covers</x-slot>
    <x-slot name="title">Download covers</x-slot>
    <div class="max-w-3xl bg-white/75 border rounded-md shadow-xl p-4">
        <?php
        $download_url = "https://pverhaert.sinners.be/covers_vinylshop.zip";
        $download_to = "storage/covers.zip";
        $extract_path = "storage/";
        $covers_path = "storage/covers/";

        try {
            $contents = file_get_contents($download_url);
            file_put_contents($download_to, $contents);

            $zip = new ZipArchive;
            if ($zip->open($download_to) === TRUE) {
                $zip->extractTo($extract_path);
                $zip->close();
                echo "<p>The file <b>$download_url</b><br>was successfully extracted to <b>$extract_path</b></p>";
                unlink($download_to);

                // Display the downloaded images
                $images = scandir($covers_path);
                if (count($images) > 2) {
                    echo "<h2>Downloaded covers:</h2>";
                    echo "<div class='flex flex-wrap justify-between mt-6 gap-4'>";
                    foreach ($images as $image) {
                        if ($image !== '.' && $image !== '..') {
                            echo "<a href='/" . $covers_path . $image . "' target='_cover'>";
                            echo "<img src='/" . $covers_path . $image . "' class='size-40 rounded-md shadow-md' alt='" . $image . "'>";
                            echo "</a>";
                        }
                    }
                    echo "</div>";
                }
            } else {
                echo "<p class='text-red-600'>Couldn't open <b>$download_to</b></p>";
            }
        } catch (Exception $e) {
            echo "<p class='text-red-600'>An error occurred: <br>" . $e->getMessage() . "</p>";
        }
        ?>
    </div>
</x-vinylshop-layout>
