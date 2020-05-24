package edu.fau.COT4930;

import javax.swing.JButton;
import javax.swing.JLabel;

public class TicTacToe {
	public TicTacToe()
	{
		
	}
	
	static Player currentPlayer = new Player();
	static Player p1 = new Player();
	static Player p2 = new Player();
	static String[] grid = new String[9]; 
	
	public static void StartNewGame(String name1, String name2, JLabel t1, JButton[] buttons)
	{
		//Reset the Board
		for(int i = 0; i <= 8; i++)
		{
			buttons[i].setText(" ");
			grid[i] = " ";
			buttons[i].setEnabled(true);
		}
		
		
		//Set the Names for Players
		p1.setName(name1);
		p1.setPlayer(1);
		
		p2.setName(name2);
		p2.setPlayer(2);
		//Start
		currentPlayer = p2;
		ChangeTurn(t1);
	}
	
	public static Boolean CheckWin(JLabel t1)
	{
		//Check Winning Cases in buttons using X, then 0.
		
		String winningLine = null;

		for (int x = 0; x < 8; x++)
		{
			switch (x) 
			{
			case 0:
				winningLine = grid[0] + grid[1] + grid[2];
				break;
			case 1:
				winningLine = grid[3] + grid[4] + grid[5];
				break;
			case 2:
				winningLine = grid[6] + grid[7] + grid[8];
				break;
			case 3:
				winningLine = grid[0] + grid[3] + grid[6];
				break;
			case 4:
				winningLine = grid[1] + grid[4] + grid[7];
				break;
			case 5:
				winningLine = grid[2] + grid[5] + grid[8];
				break;
			case 6:
				winningLine = grid[0] + grid[4] + grid[8];
				break;
			case 7:
				winningLine = grid[2] + grid[4] + grid[6];
				break;
			}
		
		//If XXX, p1 wins
		//If OOO, p2 wins
		if(winningLine.equals("XXX"))
		{
			t1.setText(p1.getName() + " Wins!");
			return true;
		}
		else if(winningLine.equals("OOO"))
		{
			t1.setText(p2.getName() + " Wins!");
			return true;
		}
		}
		
		return false;

	}
	
	public static void ChangeTurn(JLabel t1)
	{
		if(currentPlayer == p1)
		{
			currentPlayer = p2;
			t1.setText(p2.getName() + "'s Turn");
		}
		else if(currentPlayer == p2)
		{
			currentPlayer = p1;
			t1.setText(p1.getName() + "'s Turn");
		}
	}
	
	public static void PlayGrid(JButton b, Player p, JLabel t1, int i,JButton[] buttons)
	{
		b.setText(p.Symbol);
		grid[i] = p.Symbol;
		if(!CheckWin(t1))
		{
			ChangeTurn(t1);
		}
		else
		{
			for (int x = 0; x <= 8; x++)
			{buttons[x].setEnabled(false);}
		}
	}

}
