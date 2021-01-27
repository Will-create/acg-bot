from PIL import Image
image = Image.open('logo.jpeg')
new = image.resize((562,355))
#print('new',new.size)
new.save('logo.png')
new.show()
