from tkinter import *
from tkinter import ttk
import numpy as np

lines = []

class Line:
    def __init__(self):
        self.points = np.full((2, 2), -1)

    def choose_point(self, event):
        if event.widget.winfo_name() == "paint":
            x = event.x
            y = event.y
            if self.points[0][0] == -1 and self.points[0][1] == -1:
                self.points[0] = (x, y)
            else:
                self.points[1] = (x, y)

    def wait_until_complete(self, root):
        if np.all(self.points[:, 0] != -1) and np.all(self.points[:, 1] != -1):
            root.unbind("<Button-1>")
            canvas.create_line(*self.points.flatten())
        else:
            root.after(10, self.wait_until_complete, root)


def create_line():
    line = Line()
    root.bind("<Button-1>", line.choose_point)
    root.after(10, line.wait_until_complete, root)
    lines.append(line)
    print(lines)



def motion(event):
    if event.widget.winfo_name() == "paint":
        x, y = event.x, event.y
        label["text"] = '{}, {}'.format(x, y)
    else:
        label["text"] = ''


root = Tk()
root.geometry("800x600")
root.resizable(False, False)

left_frame = Frame(root, relief=SOLID, name="left")
left_frame.grid(row=0, column=0, sticky='nsew')

right_frame = Frame(root, relief=SOLID, name="right")
right_frame.grid(row=0, column=1, sticky='nsew')

canvas = Canvas(left_frame, bg="white", name="paint")
canvas.pack(fill=BOTH, expand=True)

btn = ttk.Button(right_frame, text="Линия", width=20, command=create_line)
btn.pack()

label = Label(right_frame)
label.pack(expand=1, anchor=SE)

root.bind('<Motion>', motion)

root.grid_rowconfigure(0, minsize=200, weight=1)
root.grid_columnconfigure(0, weight=10)
root.grid_columnconfigure(1, weight=1)

root.mainloop()
