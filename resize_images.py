import os
from PIL import Image

src_dir = r"d:\SUGIH\sugih\public\images\products2"
for file in os.listdir(src_dir):
    if file.endswith(('.png', '.jpg', '.jpeg')):
        path = os.path.join(src_dir, file)
        try:
            with Image.open(path) as img:
                img = img.resize((235, 273), Image.Resampling.LANCZOS)
                img.save(path)
                print(f"Resized {file}")
        except Exception as e:
            print(f"Failed {file}: {e}")
