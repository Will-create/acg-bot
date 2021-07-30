from PIL import Image
image = Image.open('LOGO ACG.png')
new = image.resize((400,400))
#print('new',new.size)
new.save('logo2.png')
new.show()
