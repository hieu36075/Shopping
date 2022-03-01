using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EX1

{
    class Dice
    {
        public int sides;
        public int guess;

        public int Roll()
        {
            Random rdn = new Random();
            return rdn.Next(1, sides + 1);
        }
    }
}
